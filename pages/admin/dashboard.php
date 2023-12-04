<?php
require('./config/database.php');

$pending = "SELECT count(*) as i FROM t_applications WHERE req_status = 'Pending'";
$prs = $conn->query($pending);
$prw = $prs->fetch_assoc();
$pending_count = $prw['i'];

$decline = "SELECT count(*) as i FROM t_applications WHERE req_status = 'Declined'";
$drs = $conn->query($decline);
$drw = $drs->fetch_assoc();
$decline_count = $drw['i'];

$approved = "SELECT count(*) as i FROM t_applications WHERE req_status = 'Approved'";
$ars = $conn->query($approved);
$arw = $ars->fetch_assoc();
$approved_count = $arw['i'];

$completed = "SELECT count(*) as i FROM t_applications WHERE req_status = 'Completed'";
$crs = $conn->query($completed);
$crw = $crs->fetch_assoc();
$completed_count = $crw['i'];

$release = "SELECT count(*) as i FROM t_applications WHERE req_status = 'Released'";
$rrs = $conn->query($release);
$rrw = $rrs->fetch_assoc();
$release_count = $rrw['i'];

$pending_corp = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Pending'";
$prs_corp = $conn->query($pending_corp);
$prw_corp = $prs_corp->fetch_assoc();
$pending_count_corp = $prw_corp['i'];

$decline_corp = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Declined'";
$drs_corp = $conn->query($decline_corp);
$drw_corp = $drs_corp->fetch_assoc();
$decline_count_corp = $drw_corp['i'];

$approved_corp = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Approved'";
$ars_corp = $conn->query($approved_corp);
$arw_corp = $ars_corp->fetch_assoc();
$approved_count_corp = $arw_corp['i'];

$completed_corp = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Completed'";
$crs_corp = $conn->query($completed_corp);
$crw_corp = $crs_corp->fetch_assoc();
$completed_count_corp = $crw_corp['i'];

$release_corp = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Released'";
$rrs_corp = $conn->query($release_corp);
$rrw_corp = $rrs_corp->fetch_assoc();
$release_count_corp = $rrw_corp['i'];

?>
<style>
    .type {
        text-align: right;
    }

    .brn {
        border-right: none;
    }
</style>
<section class="py-4">
    <div class="container px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white rounded-4 py-4 px-4 px-md-4"
                    style="border-left: 20px solid #E7E7E7; letter-spacing: 2px;">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Zoning Certicate</h3>
                            <p>Figures for Zoning Clearance Application</p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="type" width="150">Type</th>
                                        <th>Description</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="type"><b>Pending : </b></td>
                                        <td>
                                            <?= number_format($pending_count, 0) ?>
                                        </td>
                                        <td class="d-grid">
                                            <a target="_blank" href="?generate-reports-localize&type=zoning&filter=Pending"
                                                class="btn btn-light btn-sm btn-block" style="text-align: center;">
                                                <spa class="bi bi-eye">View</spa>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Approved : </b></td>
                                        <td>
                                            <?= number_format($approved_count, 0) ?>
                                        </td>
                                        <td class="d-grid">
                                            <a target="_blank" href="?generate-reports-localize&type=zoning&filter=Approved"
                                                class="btn btn-light btn-sm btn-block" style="text-align: center;">
                                                <spa class="bi bi-eye">View</spa>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Declined : </b></td>
                                        <td>
                                            <?= number_format($decline_count, 0) ?>
                                        </td>
                                        <td class="d-grid">
                                            <a target="_blank" href="?generate-reports-localize&type=zoning&filter=Declined"
                                                class="btn btn-light btn-sm btn-block" style="text-align: center;">
                                                <spa class="bi bi-eye">View</spa>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Completed : </b></td>
                                        <td>
                                            <?= number_format($completed_count, 0) ?>
                                        </td>
                                        <td class="d-grid">
                                            <a target="_blank" href="?generate-reports-localize&type=zoning&filter=Completed"
                                                class="btn btn-light btn-sm btn-block" style="text-align: center;">
                                                <spa class="bi bi-eye">View</spa>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Released : </b></td>
                                        <td>
                                            <?= number_format($release_count, 0) ?>
                                        </td>
                                        <td class="d-grid">
                                            <a target="_blank" href="?generate-reports-localize&type=zoning&filter=Released"
                                                class="btn btn-light btn-sm btn-block" style="text-align: center;">
                                                <spa class="bi bi-eye">View</spa>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h3>Localize Certicate</h3>
                            <p>Figures for Localize Clearance Application</p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="type" width="150">Type</th>
                                        <th>Description</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="type"><b>Pending : </b></td>
                                        <td>
                                            <?= number_format($pending_count_corp, 0) ?>
                                        </td>
                                        <td class="d-grid">
                                            <a target="_blank" href="?generate-reports-localize&type=localize&filter=Pending"
                                                class="btn btn-light btn-sm btn-block" style="text-align: center;">
                                                <spa class="bi bi-eye">View</spa>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Approved : </b></td>
                                        <td>
                                            <?= number_format($approved_count_corp, 0) ?>
                                        </td>
                                        <td class="d-grid">
                                            <a target="_blank" href="?generate-reports-localize&type=localize&filter=Approved"
                                                class="btn btn-light btn-sm btn-block" style="text-align: center;">
                                                <spa class="bi bi-eye">View</spa>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Declined : </b></td>
                                        <td>
                                            <?= number_format($decline_count_corp, 0) ?>
                                        </td>
                                        <td class="d-grid">
                                            <a target="_blank" href="?generate-reports-localize&type=localize&filter=Declined"
                                                class="btn btn-light btn-sm btn-block" style="text-align: center;">
                                                <spa class="bi bi-eye">View</spa>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Completed : </b></td>
                                        <td>
                                            <?= number_format($completed_count_corp, 0) ?>
                                        </td>
                                        <td class="d-grid">
                                            <a target="_blank" href="?generate-reports-localize&type=localize&filter=Completed"
                                                class="btn btn-light btn-sm btn-block" style="text-align: center;">
                                                <spa class="bi bi-eye">View</spa>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type"><b>Released : </b></td>
                                        <td>
                                            <?= number_format($release_count_corp, 0) ?>
                                        </td>
                                        <td class="d-grid">
                                            <a target="_blank" href="?generate-reports-localize&type=localize&filter=Released"
                                                class="btn btn-light btn-sm btn-block" style="text-align: center;">
                                                <spa class="bi bi-eye">View</spa>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card" style="min-height: 200px">
                        <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">List of Request
                            (Zoning Certicate)
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Applicant</th>
                                        <th>Address</th>
                                        <th width="180">Date Request</th>
                                        <th width="120" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require('./config/database.php');
                                    $sql = "SELECT *FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode ORDER BY req_id DESC LIMIT 0,20";

                                    $result = $conn->query($sql);

                                    if (!$result) {
                                        die("Query failed: " . $conn->error);
                                    }
                                    $num = 1;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $num++ ?>.
                                                </td>
                                                <td>
                                                    <?= $row["req_lastName"] . ', ' . $row["req_firstName"] ?>
                                                </td>
                                                <td>
                                                    <?= $row["citymunDesc"] . ', ' . $row["brgyDesc"] ?>
                                                </td>
                                                <td>
                                                    <?= date_format(date_create($row['req_date']), 'F d, Y') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $row['req_status'] ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "No results found.";
                                    }

                                    $conn->close();
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="col-md-12">
                    <div class="card" style="min-height: 200px">
                        <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">List of Request
                            (Locatonal Certicate)
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Corporation</th>
                                        <th>Address</th>
                                        <th width="180">Date Request</th>
                                        <th width="100" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require('./config/database.php');
                                    if (isset($_GET['list-localize'])) {
                                        $list = $_GET['list-localize'];
                                        if (isset($_GET['search'])) {
                                            $search = $_GET['search'];
                                        } else {
                                            $search = '';
                                        }

                                        $sql = "SELECT * FROM t_localize_info INNER JOIN ph_citymun ON local_citymun = citymunCode INNER JOIN ph_brgy ON local_brgy = brgyCode WHERE local_status LIKE '$list' AND (local_applicant LIKE '%$search%' OR local_corporation LIKE '%$search%')";
                                    } else {
                                        $sql = "SELECT * FROM t_localize_info INNER JOIN ph_citymun ON local_citymun = citymunCode INNER JOIN ph_brgy ON local_brgy = brgyCode";
                                    }


                                    $result = $conn->query($sql);

                                    if (!$result) {
                                        die("Query failed: " . $conn->error);
                                    }
                                    $num = 1;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $num++ ?>.
                                                </td>
                                                <td>
                                                    <?= $row["local_corporation"] ?>
                                                </td>
                                                <td>
                                                    <?= $row["citymunDesc"] . ', ' . $row["brgyDesc"] ?>
                                                </td>
                                                <td>
                                                    <?= date_format(date_create($row['local_date']), 'F d, Y') ?>
                                                </td>
                                                <td class="text-center">
                                                    <center>
                                                        <?php
                                                        if ($row['local_status'] == 'Pending') {
                                                            ?>
                                                            <span class="">Pending</span>
                                                            <?php
                                                        } elseif ($row['local_status'] == 'Approved') {
                                                            ?>
                                                            <span class="">Approved</span>
                                                            <?php
                                                        } elseif ($row['local_status'] == 'Declined') {
                                                            ?>
                                                            <span class="">Declined</span>
                                                            <?php
                                                        } elseif ($row['local_status'] == 'Completed') {
                                                            ?>
                                                            <span class="">Completed</span>
                                                            <?php
                                                        } elseif ($row['local_status'] == 'Released') {
                                                            ?>
                                                            <span class="">Released</span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        //echo 'No results found. <b style="color: red">"' . $search . '" </b><hr>';
                                    }

                                    $conn->close();
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">

        </div>
    </div>
</section>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>

    <script>
        function view(type, id) {
            if (type == 3) {
                document.getElementById('exampleModalLabel').innerHTML = 'View Application Details';
            }
            $.ajax({
                method: "POST",
                url: './app/operator.php',
                data: { "type": type, 'id': id },
            })
                .done(function (response) {
                    $(".modal-body").html(response);
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.error("Request failed:", textStatus, errorThrown);
                });
        }
    </script>