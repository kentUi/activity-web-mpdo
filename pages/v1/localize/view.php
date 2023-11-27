<?php
require('./config/database.php');

$id = $_GET['id'];
$sql = "SELECT * FROM t_localize_info INNER JOIN ph_region ON local_region = regCode INNER JOIN ph_province ON local_province = provCode INNER JOIN ph_citymun ON local_citymun = citymunCode INNER JOIN ph_brgy ON local_brgy = brgyCode WHERE local_id = '$id'";


$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No results found.";
}

$sql_corp = "SELECT * FROM t_localize_info INNER JOIN ph_region ON local_region_corp = regCode INNER JOIN ph_province ON local_province_corp = provCode INNER JOIN ph_citymun ON local_citymun_corp = citymunCode INNER JOIN ph_brgy ON local_brgy_corp = brgyCode WHERE local_id = '$id'";


$result_corp = $conn->query($sql_corp);

if (!$result_corp) {
    die("Query failed: " . $conn->error);
}

if ($result_corp->num_rows > 0) {
    $row_corp = $result_corp->fetch_assoc();
} else {
    echo "No results found.";
}

$conn->close();

error_reporting(0);
function convertNumberToWords($number)
{
    $ones = array(
        0 => 'Zero',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen'
    );

    $tens = array(
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety'
    );

    $number = (int) $number;

    if ($number < 20) {
        return $ones[$number];
    } elseif ($number < 100) {
        return $tens[($number / 10) * 10] . ' ' . convertNumberToWords($number % 10);
    } elseif ($number < 1000) {
        return $ones[$number / 100] . ' Hundred ' . convertNumberToWords($number % 100);
    } elseif ($number < 1000000) {
        return convertNumberToWords($number / 1000) . ' Thousand ' . convertNumberToWords($number % 1000);
    } else {
        return 'Number is too large for this simple converter';
    }
}

$number = $row_corp['local_projectcost'];
$words = convertNumberToWords($number);

?>

<style>
    .form-control {
        /* border: 1px solid #e1e1e1; */
        border: none;
    }

    .type {
        text-align: right;
    }

    .brn {
        border-right: none;
    }
</style>
<script>
    var formControlInputs = document.querySelectorAll('input.form-control');
    for (var i = 0; i < formControlInputs.length; i++) {
        formControlInputs[i].readOnly = true;
    }
</script>
<section class="py-4">
    <div class="container px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="min-height: 350px">
                    <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">Locational
                        Application
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Personal Information</h2>
                                <p>This application will display the name, address, etc. of the person.</p>
                                <?php
                                if ($row['local_status'] == 'Completed') {
                                    ?>
                                    <span style="right: 45px; top: 76px; position: absolute;">
                                        To be Claim at :
                                        <b class="text-danger">
                                            <?= date_format(date_create($row['local_tobeclaim']), 'F d, Y') ?>
                                        </b>
                                    </span>
                                    <?php
                                }
                                ?>


                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="type" width="200">Type</th>
                                            <th class="brn">Description</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="type"><b>Status : </b></td>
                                        <td>
                                            <?php
                                            if ($row['local_status'] == 'Pending') {
                                                ?>
                                                <span class="badge bg-warning">Pending</span>
                                                <?php
                                            } elseif ($row['local_status'] == 'Approved') {
                                                ?>
                                                <span class="badge bg-primary">Approved</span>
                                                <?php
                                            } elseif ($row['local_status'] == 'Declined') {
                                                ?>
                                                <span class="badge bg-danger">Declined</span>
                                                <?php
                                            } elseif ($row['local_status'] == 'Completed') {
                                                ?>
                                                <span class="badge bg-info">Completed</span>
                                                <?php
                                            } elseif ($row['local_status'] == 'Released') {
                                                ?>
                                                <span class="badge bg-success">Released</span>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td width="220" style="text-align: right"><b>Date Request : </b></td>
                                        <td class="brn">
                                            <?= date_format(date_create($row['local_date']), 'F d, Y') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Name : </b></td>
                                        <td class="brn">
                                            <?= $row['local_applicant'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Region : </b></td>
                                        <td class="brn">
                                            <?= $row['regDesc'] ?>
                                        </td>
                                        <td class="type"><b>City/Municipality : </b></td>
                                        <td class="brn">
                                            <?= $row['citymunDesc'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Barangay : </b></td>
                                        <td class="brn">
                                            <?= $row['brgyDesc'] ?>
                                        </td>
                                        <td class="brn"></td>
                                        <td class="brn">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"></td>
                                        <td class="brn"><i style="color: red">* Corporation *</i></td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Name : </b></td>
                                        <td class="brn">
                                            <?= $row['local_corporation'] ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="type"><b>Region : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['regDesc'] ?>
                                        </td>
                                        <td class="type"><b>City/Municipality : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['citymunDesc'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Barangay : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['brgyDesc'] ?>
                                        </td>
                                        <td class="brn"></td>
                                        <td class="brn">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"></td>
                                        <td class="brn"><i style="color: red">* Projects *</i></td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Type : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_projectype'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Location : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_projectlocation'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Nature : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_projectnature'] ?>
                                        </td>
                                        <td class="type"><b>Specific : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_projectnature_specific'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Tenure : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_projecttenure'] ?>
                                        </td>
                                        <td class="type"><b>Specific : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_projecttenure_specific'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Right Over Land : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_overland'] ?>
                                        </td>
                                        <td class="type"><b>Specific : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_overland_specific'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Project Site : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_projectsite'] ?>
                                        </td>
                                        <td class="type"><b>Specific : </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_projectsite_specific'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Project Cost: </b></td>
                                        <td class="brn">
                                            <?= $words ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Lot (sqm): </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_projectarealot'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Bldg. (sqm): </b></td>
                                        <td class="brn">
                                            <?= $row_corp['local_projectareabldg'] ?>
                                        </td>
                                    </tr>
                                    </tr>
                                </table>
                                <?php
                                require('./config/database.php');
                                $sql_other = "SELECT * FROM t_localize_other WHERE local_id = '$id'";
                                $result_other = $conn->query($sql_other);
                                $row_other = $result_other->fetch_assoc();
                                ?>
                                <p>
                                    <b>Is the project applied for subject written notice(s) from the Board and/or
                                        Deputized Zoning Admistrator to the effect requiring for presentaion of
                                        Locational Clerance?
                                    </b>
                                </p>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="" width="200">-</th>
                                            <th class="brn" width="235">-</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class=""><b>A. Name of HLURB Officer who issued the notice </b></td>
                                        <td style="padding-top: 20px">
                                            <?= $row_other['local_a_hlurb'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=""><b>B. Order/Request indicated in the Notice(s) </b></td>
                                        <td style="padding-top: 20px">
                                            <?= $row_other['local_b_order'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=""><b>C. Date of Notice </b></td>
                                        <td style="padding-top: 20px">
                                            <?= date_format(date_create($row_other['local_c_datenotice']), 'F d, Y') ?>
                                        </td>
                                    </tr>
                                </table>
                                <p>
                                    <b>
                                        Is the project applied for, Subject of similar application(s) with other offices
                                        of the Board and/or DZA ?
                                    </b>
                                </p>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="" width="200">-</th>
                                            <th class="brn" width="235">-</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class=""><b><small> A. Other HLURB Offices where similar application was
                                                    filed</small></b></td>
                                        <td style="padding-top: 20px">
                                            <?= $row_other['local_a_otherhlurb'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=""><b>B. Date Filed</b></td>
                                        <td style="padding-top: 20px">
                                            <?= date_format(date_create($row_other['local_b_datefiled']), 'F d, Y') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=""><b>C. Action Taken </b></td>
                                        <td style="padding-top: 20px">
                                            <?= $row_other['local_c_actiontaken'] ?>
                                        </td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <blockquote style="padding-left: 25px;">
                                            <p>Requirements <strong>(Photo Copy only)</strong></p>
                                            <?php
                                            $req = [
                                                'PROOF OF OWNERSHOP OVER THE LAND',
                                                'VICINITY MAP',
                                                'SITE DEVELOPMENT PLAN',
                                                'FLOOR PLAN',
                                                'CERIFICATE OF ZONING',
                                                'BILL OF MATERIAL/ESTIMATED OF THE PROJECT',
                                                'BARANGAY CONSTRUCTION CLEARANCE',
                                                'LINE & GRADE CLEARANCE',
                                                'COPY OF BUILDING PERMIT'
                                            ];
                                            ?>
                                            <ul>
                                                <?php
                                                for ($i = 0; $i < count($req); $i++) {
                                                    $req_data = $req[$i];
                                                    $sql_req = "SELECT * FROM t_localize_req WHERE local_id = '$id' AND local_type = '$req_data'";
                                                    $result_req = $conn->query($sql_req);
                                                    $row_req = $result_req->fetch_assoc();
                                                    ?>
                                                    <li>
                                                        <a target="_blank" href="/<?= $row_req['local_path'] ?>"
                                                            style="text-decoration: none" href="#">
                                                            <?= $req[$i] ?>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <?php 
                                            if($row['req_status'] == 'Declined'){
                                                require('./config/database.php');

                                                $sql_res = "SELECT * FROM t_reasons INNER JOIN t_accounts ON rs_by = acc_id WHERE rs_appid = '$id' AND rs_type = 'localize'";

                                                $result_res = $conn->query($sql_res);
                                                $row_res = $result_res->fetch_assoc();
                                                ?>
                                                <hr>
                                                 <p><b style="color: red;">REASON :</b> (Specific Details) <br> <small> Declined By: <?= $row_res['acc_fname'] ?> <?= $row_res['acc_lname'] ?></small></p>
                                                <div class="jumbotron">
                                                <p><b>Reason</b>: <?= $row_res['rs_details'] ?> </p> 
                                                </div>
                                                <?php
                                            }
                                           ?>
                                        </blockquote>
                                        <hr>
                                        <center>
                                            <?php
                                            if ($_SESSION['typeID'] == 1) {
                                                if ($row['local_status'] == 'Approved') {
                                                    ?>
                                                    <a href="/?list-localize=<?= $row['local_status'] ?>"
                                                        class="btn btn-default" style="margin-right: 10px;">
                                                        <span class="bi bi-arrow-left"></span> &nbsp;
                                                        Return
                                                    </a>
                                                    <button class="btn btn-success" style="margin-right: 10px;"
                                                        data-bs-toggle="modal" data-bs-target="#complete">
                                                        <span class="bi bi-play"></span> &nbsp;
                                                        The Application is Completed & Ready
                                                    </button>
                                                    <!-- <a href="?print-zoning&id=<?= $row['local_id'] ?>" target="_blank"
                                                        class="btn btn-warning text-white">
                                                        <span class="bi bi-printer"></span> &nbsp;
                                                        Print Application
                                                    </a> -->
                                                    <?php
                                                } elseif ($row['local_status'] == 'Completed') {
                                                    ?>
                                                    <a href="/?list-localize=<?= $row['local_status'] ?>"
                                                        class="btn btn-default" style="margin-right: 10px;">
                                                        <span class="bi bi-arrow-left"></span> &nbsp;
                                                        Return
                                                    </a>
                                                    <button class="btn btn-success" style="margin-right: 10px;"
                                                        data-bs-toggle="modal" data-bs-target="#release">
                                                        <span class="bi bi-save"></span> &nbsp;
                                                        The Application is now released
                                                    </button>
                                                    <?php
                                                } elseif ($row['local_status'] == 'Pending') {
                                                    ?>
                                                    <a href="/?list-localize=<?= $row['local_status'] ?>"
                                                        class="btn btn-default" style="margin-right: 10px;">
                                                        <span class="bi bi-arrow-left"></span> &nbsp;
                                                        Return
                                                    </a>
                                                    <button class="btn btn-success" style="margin-right: 10px;"
                                                        data-bs-toggle="modal" data-bs-target="#approval">
                                                        <span class="bi bi-check"></span> &nbsp;
                                                        Approve Application
                                                    </button>
                                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#decline">
                                                        <span class="bi bi-trash"></span> &nbsp;
                                                        Decline Application
                                                    </button>
                                                    &ensp; OR &ensp;
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#verify" onclick="verify_id()">
                                                        <span class="bi bi-search"></span> &nbsp;
                                                        Verify from Master List
                                                    </button>
                                                <?php } else {
                                                    if (!isset($_GET['type'])) {

                                                        ?>
                                                        <a href="/?list-localize=<?= $row['local_status'] ?>"
                                                            class="btn btn-default" style="margin-right: 10px;">
                                                            <span class="bi bi-arrow-left"></span> &nbsp;
                                                            Return
                                                        </a>
                                                        <?php
                                                    }
                                                }
                                            } else {
                                                ?>
                                                <a href="/?member" class="btn btn-default" style="margin-right: 10px;">
                                                    <span class="bi bi-arrow-left"></span> &nbsp;
                                                    Return
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require('./config/database.php');
$ref_corp = $row['local_corporation'];
$sql_ref = "SELECT * FROM t_localize_info WHERE local_corporation like '$ref_corp' AND local_status = 'Released' ORDER BY local_id DESC";
$result_ref = $conn->query($sql_ref);

if (!$result_ref) {
    die("Query failed: " . $conn->error);
}

if ($result_ref->num_rows > 0) {
    $row_ref = $result_ref->fetch_assoc();
    $link_data_id = $row_ref['local_id'];
    ?>
    <script>
        function displayForm2() {
            document.getElementById('loading').style.display = 'none';
            document.getElementById('found').style.display = 'block';
        }

        function verify_id() {
            setTimeout(displayForm2, 3000);
        }
    </script>
    <?php
} else {
    $link_data_id = '0';
    ?>
    <script>
        function displayForm2() {
            document.getElementById('loading').style.display = 'none';
            document.getElementById('not_found').style.display = 'block';
        }

        function verify_id() {
            setTimeout(displayForm2, 3000);
        }
    </script>
    <?php
}
require('./pages/v1/localize/dialog.php');
?>