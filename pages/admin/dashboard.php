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
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white rounded-4 py-4 px-4 px-md-4"
                    style="border-left: 20px solid #ffb238; letter-spacing: 2px; max-height: 138px">
                    <h2 class="text-dark"><b>
                            <?= number_format($pending_count, 0) ?>
                        </b></h2>
                    <h6 class="text-dark">PENDING</h6>
                    <img style="position: relative; top: -60px; left: 120px;" src="./assets/expired.png" class="img"
                        height="60" alt="">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-white rounded-4 py-4 px-4 px-md-4"
                            style="border-left: 20px solid #DC3545; letter-spacing: 2px; max-height: 138px">
                            <h2 class="text-dark"><b>
                                    <?= number_format($decline_count, 0) ?>
                                </b></h2>
                            <h6 class="text-dark">DECLINE</h6>
                            <img style="position: relative; top: -60px; left: 120px;" src="./assets/denied.png"
                                class="img" height="60" alt="">
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="bg-white rounded-4 py-4 px-4 px-md-4"
                            style="border-left: 20px solid #3498db; letter-spacing: 2px; max-height: 138px">
                            <h2 class="text-dark"><b>
                                    <?= number_format($approved_count, 0) ?>
                                </b></h2>
                            <h6 class="text-dark">APPROVED</h6>
                            <img style="position: relative; top: -60px; left: 120px;" src="./assets/checkbox.png"
                                class="img" height="60" alt="">
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="bg-white rounded-4 py-4 px-4 px-md-4"
                            style="border-left: 20px solid #cbe558; letter-spacing: 2px; max-height: 138px">
                            <h2 class="text-dark"><b>
                                    <?= number_format($completed_count, 0) ?>
                                </b></h2>
                            <h6 class="text-dark" style="font-size: 15px">COMPLETED</h6>
                            <img style="position: relative; top: -60px; left: 120px;" src="./assets/goal.png"
                                class="img" height="55" alt="">
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="bg-white rounded-4 py-4 px-4 px-md-4"
                            style="border-left: 20px solid #2ecc71; letter-spacing: 2px; max-height: 138px">
                            <h2 class="text-dark"><b>
                                    <?= number_format($release_count, 0) ?>
                                </b></h2>
                            <h6 class="text-dark">RELEASED</h6>
                            <img style="position: relative; top: -60px; left: 120px;" src="./assets/done.png"
                                class="img" height="60" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="col-md-12">
                    <div class="card" style="min-height: 600px">
                        <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">List of Request
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Complete name</th>
                                        <th width="180">Date Request</th>
                                        <th width="120" class="text-center">Status</th>
                                        <th width="200" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require('./config/database.php');
                                    $sql = "SELECT *FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode";

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
                                                    <?= date_format(date_create($row['req_date']), 'F d, Y') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $row['req_status'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="?zoning&id=<?= $row['req_id'] ?>"
                                                        class="btn btn-success btn-sm">View</a>
                                                    <!-- <button data-bs-toggle="modal" data-bs-target="#myModal"
                                                    class="btn btn-success btn-sm"
                                                    onclick="view(3, <?= $row['req_id'] ?>)">View</button> -->
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