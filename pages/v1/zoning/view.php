<?php
require('./config/database.php');

$id = $_GET['id'];
$sql = "SELECT * FROM t_applications INNER JOIN ph_region ON req_region = regCode INNER JOIN ph_province ON req_province = provCode INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode WHERE req_id = '$id'";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No results found.";
}

$conn->close();
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
                    <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">Zoning Application
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Personal Information</h2>
                                <p>This application will display the name, address, etc. of the person.</p>
                                <?php
                                if ($row['req_status'] == 'Completed') {
                                    ?>
                                    <span style="right: 45px; top: 76px; position: absolute;">To be Claim on :
                                        <b class="text-danger">
                                            <?= date_format(date_create($row['req_tobeclaim']), 'F d, Y') ?>
                                        </b>
                                    </span>
                                    <?php
                                }elseif ($row['req_status'] == 'Released') {
                                    ?>
                                    <span style="right: 45px; top: 76px; position: absolute;">Date Released :
                                        <b class="text-success">
                                            <?= date_format(date_create($row['req_daterelease']), 'F d, Y') ?>
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
                                            if ($row['req_status'] == 'Pending') {
                                                ?>
                                                <span class="badge bg-warning">Pending</span>
                                                <?php
                                            } elseif ($row['req_status'] == 'Approved') {
                                                ?>
                                                <span class="badge bg-primary">Approved</span>
                                                <?php
                                            } elseif ($row['req_status'] == 'Declined') {
                                                ?>
                                                <span class="badge bg-danger">Declined</span>
                                                <?php
                                            } elseif ($row['req_status'] == 'Completed') {
                                                ?>
                                                <span class="badge bg-info">Completed</span>
                                                <?php
                                            } elseif ($row['req_status'] == 'Released') {
                                                ?>
                                                <span class="badge bg-success">Released</span>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td width="180" style="text-align: right"><b>Date Request : </b></td>
                                        <td class="brn">
                                            <?= date_format(date_create($row['req_date']), 'F d, Y') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>First Name : </b></td>
                                        <td class="brn">
                                            <?= $row['req_firstName'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Last Name : </b></td>
                                        <td class="brn">
                                            <?= $row['req_lastName'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Name of Owner :</b></td>
                                        <td class="brn">
                                            <?= $row['req_owner'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Tax Declaration :</b></td>
                                        <td class="brn">
                                            <?= $row['req_ownertaxdec'] ?>
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
                                        <td class="type"><b>Street, Subd.: </b></td>
                                        <td class="brn">
                                            <?= $row['req_street'] ?>
                                        </td>
                                    </tr>
                                </table>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="type" width="200">-</th>
                                            <th class="brn" width="235">-</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="type"><b>Total Area of Lot (sqm) : </b></td>
                                        <td>
                                            <?= $row['req_sqrmeter'] ?>
                                        </td>
                                        <td width="180" style="text-align: right"><b>Right over Land : </b></td>
                                        <td class="brn">
                                            <?= $row['req_overland'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Mode of release of certification : </b></td>
                                        <td style="padding-top: 20px">
                                            <?= $row['req_mode'] ?>
                                        </td>
                                        <td style="padding-top: 20px; text-align: right" width="180"><b>To : </b></td>
                                        <td style="padding-top: 20px" class="brn">
                                            <?= $row['req_ownertitle'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Receiver Name : </b></td>
                                        <td>
                                            <?= $row['req_receiver'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Email address : </b></td>
                                        <td>
                                            <?= $row['req_email'] ?>
                                        </td>
                                        <td width="180" style="text-align: right"><b>Phone number : </b></td>
                                        <td class="brn">
                                            <?= $row['req_mobile'] ?>
                                        </td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <blockquote style="padding-left: 25px;">
                                            <p>Requirements <strong>(Photo Copy only)</strong></p>
                                            <ul>
                                                <li>
                                                    <a target="_blank" onclick="checking_1(1)"
                                                        href="/<?= $row['req_ref_file_1'] ?>"
                                                        style="text-decoration: none" href="#">Vicinity Map, Geographic
                                                        Coordinates (WGS 84) Or V037 from DENR X Land Department</a>
                                                </li>
                                                <li>
                                                    <a target="_blank" onclick="checking_2(1)"
                                                        href="/<?= $row['req_ref_file_2'] ?>"
                                                        style="text-decoration: none" href="#">TCT (proof of ownership
                                                        or
                                                        right over the property) OR Latest Tax Declaration Form
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" onclick="checking_3(1)"
                                                        href="/<?= $row['req_ref_file_3'] ?>"
                                                        style="text-decoration: none" href="#">Latest Tax Clearance form
                                                        the Municaplity Treasurer`s Ofiice
                                                    </a>
                                                </li>
                                            </ul>
                                            <script>
                                                var validate_requirments_1 = 0;
                                                var validate_requirments_2 = 0;
                                                var validate_requirments_3 = 0;

                                                function checking_1(num) {
                                                    validate_requirments_1 = 1;
                                                    checked();
                                                }

                                                function checking_2(num) {
                                                    validate_requirments_2 = 1;
                                                    checked();

                                                }

                                                function checking_3(num) {
                                                    validate_requirments_3 = 1;
                                                    checked();
                                                }

                                                function checked() {
                                                    var opened = Number(validate_requirments_1) + Number(validate_requirments_2) + Number(validate_requirments_3);

                                                    if (opened >= 3) {
                                                        document.getElementById('checking_validation_first').style.display = 'block';
                                                    }
                                                }
                                            </script>
                                            <?php
                                            if ($row['req_status'] == 'Declined') {
                                                require('./config/database.php');

                                                $sql_res = "SELECT * FROM t_reasons INNER JOIN t_accounts ON rs_by = acc_id WHERE rs_appid = '$id' AND rs_type = 'zoning'";

                                                $result_res = $conn->query($sql_res);
                                                $row_res = $result_res->fetch_assoc();
                                                ?>
                                                <hr>
                                                <p><b style="color: red;">REASON :</b> (Specific Details) <br> <small>
                                                        Declined By:
                                                        <?= $row_res['acc_fname'] ?>
                                                        <?= $row_res['acc_lname'] ?>
                                                    </small></p>
                                                <div class="jumbotron">
                                                    <p><b>Reason</b>:
                                                        <?= $row_res['rs_details'] ?>
                                                    </p>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </blockquote>
                                        <hr>
                                        <center>
                                            <?php
                                            if ($_SESSION['typeID'] == 1) {
                                                if ($row['req_status'] == 'Approved') {
                                                    ?>
                                                    <a href="/?list-zoning=<?= $row['req_status'] ?>" class="btn btn-default"
                                                        style="margin-right: 10px;">
                                                        <span class="bi bi-arrow-left"></span> &nbsp;
                                                        Return
                                                    </a>
                                                    <button class="btn btn-success" style="margin-right: 10px;"
                                                        data-bs-toggle="modal" data-bs-target="#complete">
                                                        <span class="bi bi-play"></span> &nbsp;
                                                        The Application is Completed & Ready
                                                    </button>
                                                    <a href="?print-zoning&id=<?= $row['req_id'] ?>" target="_blank"
                                                        class="btn btn-warning text-white">
                                                        <span class="bi bi-printer"></span> &nbsp;
                                                        Print Application
                                                    </a>
                                                    <?php
                                                } elseif ($row['req_status'] == 'Completed') {
                                                    ?>
                                                    <a href="/?list-zoning=<?= $row['req_status'] ?>" class="btn btn-default"
                                                        style="margin-right: 10px;">
                                                        <span class="bi bi-arrow-left"></span> &nbsp;
                                                        Return
                                                    </a>
                                                    <button class="btn btn-success" style="margin-right: 10px;"
                                                        data-bs-toggle="modal" data-bs-target="#release">
                                                        <span class="bi bi-save"></span> &nbsp;
                                                        The Application is now released
                                                    </button>
                                                    <?php
                                                } elseif ($row['req_status'] == 'Pending') {
                                                    ?>
                                                    <span id="checking_validation_first" style="display: none;">
                                                        <a href="/?list-zoning=<?= $row['req_status'] ?>"
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
                                                    </span>
                                                <?php } else {
                                                    if (!isset($_GET['type'])) {

                                                        ?>
                                                        <a href="/?list-zoning=<?= $row['req_status'] ?>" class="btn btn-default"
                                                            style="margin-right: 10px;">
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
$ref_fame = $row['req_firstName'];
$ref_lname = $row['req_lastName'];
$sql_ref = "SELECT * FROM t_applications WHERE req_firstName like '$ref_fame' and req_lastName like '$ref_lname' AND req_status = 'Released' ORDER BY req_id DESC";
$result_ref = $conn->query($sql_ref);

if (!$result_ref) {
    die("Query failed: " . $conn->error);
}

if ($result_ref->num_rows > 0) {
    $row_ref = $result_ref->fetch_assoc();
    $link_data_id = $row_ref['req_id'];
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

require('./pages/v1/zoning/dialog.php');
?>