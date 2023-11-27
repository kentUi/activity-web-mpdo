<?php
require('./config/database.php');

$pending = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Pending'";
$prs = $conn->query($pending);
$prw = $prs->fetch_assoc();
$pending_count = $prw['i'];

$decline = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Declined'";
$drs = $conn->query($decline);
$drw = $drs->fetch_assoc();
$decline_count = $drw['i'];

$approved = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Approved'";
$ars = $conn->query($approved);
$arw = $ars->fetch_assoc();
$approved_count = $arw['i'];

$completed = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Completed'";
$crs = $conn->query($completed);
$crw = $crs->fetch_assoc();
$completed_count = $crw['i'];

$release = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Released'";
$rrs = $conn->query($release);
$rrw = $rrs->fetch_assoc();
$release_count = $rrw['i'];

?>
<section class="py-4">
    <div class="container px-5">
        <h1>LOCATION APPLICATIONS</h1>
        <p>YOU CAN CHECK THE LIST OF APPLICATION FOR LOCATIONAL CERT.</p>
        <a href="/?applications" class="btn btn-default" style="margin-right: 10px;">
            <span class="bi bi-arrow-left"></span> &nbsp;
            Return
        </a>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card" style="min-height: 550px;">
                        <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">List of Request
                        </div>
                        <div class="card-body" style=" padding-top: 0px">
                            <div class="row mt-4 mb-4">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <p class="p-2 px-3 text-white"
                                                    style="background-color: gray; text-align: left">
                                                    You can find the pending applications here:
                                                </p>
                                            </div>
                                            <div class="col-lg-4 col-xl-7"></div>
                                            <div class="col-lg-4 col-xl-5">
                                                <center>
                                                    <a href="?list-localize=pending" class="btn btn-default btn-block"
                                                        style="width: 95%; border: 1px solid #e1e1e1;">
                                                        <img src="assets/folder.png" height="65" style="margin: 15px">
                                                        <br> Pending Applications <br>
                                                        Total Count : <b>(
                                                            <?= number_format($pending_count, 0) ?> )
                                                        </b>
                                                    </a>
                                                </center>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="p-2 px-3 text-white"
                                                        style="background-color: gray; text-align: left">
                                                        You can find the approved/declined applications here:
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-xl-6">
                                                    <center>
                                                        <a href="?list-localize=approved" class="btn btn-block btn-default"
                                                            style="width: 95%; border: 1px solid #e1e1e1">
                                                            <img src="assets/verified.png" height="65"
                                                                style="margin: 15px">
                                                            <br> Approved Applications <br>
                                                            Total Count : <b>(
                                                                <?= number_format($approved_count, 0) ?> )
                                                            </b>
                                                        </a>
                                                    </center>
                                                </div>
                                                <div class="col-lg-4 col-xl-6">
                                                    <center>
                                                        <a href="?list-localize=declined" class="btn btn-block btn-default"
                                                            style="width: 95%; border: 1px solid #e1e1e1">
                                                            <img src="assets/decline.png" height="65"
                                                                style="margin: 15px">
                                                            <br> Declined Applications <br>
                                                            Total Count : <b>(
                                                                <?= number_format($decline_count, 0) ?> )
                                                            </b>
                                                        </a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-4 mb-4">
                                <div class="col-md-12">
                                    <p class="p-2 px-3 text-white" style="background-color: gray; text-align: left">
                                        You can find the approved/declined applications here:
                                    </p>
                                </div>
                                <div class="col-lg-4 col-xl-6"></div>
                                <div class="col-lg-4 col-xl-3">
                                    <center>
                                        <a href="?list-localize=completed" class="btn btn-default btn-block"
                                            style="width: 95%; border: 1px solid #e1e1e1;">
                                            <img src="assets/done (1).png" height="65" style="margin: 15px">
                                            <br> Completed Applications <br>
                                            Total Count : <b>(
                                                <?= number_format($completed_count, 0) ?> )
                                            </b>
                                        </a>
                                    </center>
                                </div>
                                <div class="col-lg-4 col-xl-3">
                                    <center>
                                        <a href="?list-localize=released" class="btn btn-block btn-default"
                                            style="width: 95%; border: 1px solid #e1e1e1">
                                            <img src="assets/documentation.png" height="65" style="margin: 15px">
                                            <br> Released Applications <br>
                                            Total Count : <b>(
                                                <?= number_format($release_count, 0) ?> )
                                            </b>
                                        </a>
                                    </center>
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