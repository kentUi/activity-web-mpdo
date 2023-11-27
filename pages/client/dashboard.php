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

?>
<section class="py-4">
    <div class="container px-5">

        <div class="row mt-3">

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card" style="min-height: 600px">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="/assets/avatar.png" height="120" style="float: right;" class="mt-3">
                                    <br>
                                </div>
                                <div class="col-md-10">
                                    <br>
                                    <h3>Welcome Back!
                                        <?= $_SESSION['fname'] ?>
                                        <?= $_SESSION['lname'] ?>
                                    </h3>
                                    <p>You can request a clearance to MPDO.</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="row mt-3 mb-4">
                                                <div class="col-lg-6 col-xl-6">
                                                    <center>
                                                        <a href="?zone" class="btn btn-default btn-block"
                                                            style="width: 95%; border: 1px solid #e1e1e1;">
                                                            <img src="/assets/resume.png" height="65"
                                                                style="margin: 15px">
                                                            <br> Application for <br> Zoning Certificate
                                                        </a>
                                                    </center>
                                                </div>
                                                <div class="col-lg-6 col-xl-6">
                                                    <center>
                                                        <a href="?localize" class="btn btn-block btn-default"
                                                            style="width: 95%; border: 1px solid #e1e1e1">
                                                            <img src="assets/job.png" height="65" style="margin: 15px">
                                                            <br>
                                                            Application for <br> Locational Certificate
                                                        </a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <p class="p-2 px-3 text-white" style="background-color: gray; text-align: left">
                                            Request List for Zoning Certificate
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Clearance Type</th>
                                                    <th width="180">Date Request</th>
                                                    <th width="120" class="text-center">Status</th>
                                                    <th width="200" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require('./config/database.php');
                                                $id = $_SESSION['id'];
                                                $sql = "SELECT * FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode WHERE req_accid = '$id'";

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
                                                                Zoning Certificate
                                                            </td>

                                                            <td>
                                                                <?= date_format(date_create($row['req_date']), 'F d, Y') ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?= $row['req_status'] ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="?zoning&id=<?= $row['req_id'] ?>"
                                                                    class="btn btn-success btn-sm">View</a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "";
                                                }

                                                $conn->close();
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="p-2 px-3 text-white" style="background-color: gray; text-align: left">
                                            Request List for Locational Certificate
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                                <tr style="color: #fff; font-size: 1px">
                                                    <th>#</th>
                                                    <th>Clearance Type</th>
                                                    <th width="180">Date Request</th>
                                                    <th width="120" class="text-center">Status</th>
                                                    <th width="200" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require('./config/database.php');
                                                $sql = "SELECT * FROM t_localize_info INNER JOIN ph_citymun ON local_citymun = citymunCode INNER JOIN ph_brgy ON local_brgy = brgyCode WHERE local_accid = '$id'";

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
                                                                Locational Certificate
                                                            </td>

                                                            <td>
                                                                <?= date_format(date_create($row['local_date']), 'F d, Y') ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?= $row['local_status'] ?>
                                                            </td>
                                                            <td class="text-center">
                                                            <a href="?local&id=<?= $row['local_id'] ?>"
                                                                    class="btn btn-success btn-sm">View</a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "";
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