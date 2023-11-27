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
        <h1>MANAGEMENT PANEL</h1>
        <p>YOU CAN CHECK THE LOGS AND ACCOUNT SETTINGS HERE</p>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card" style="min-height: 300px;">
                        <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">Management Menu
                        </div>
                        <div class="card-body" style=" padding-top: 0px">
                            <div class="row mt-4 mb-4">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <p class="p-2 px-3 text-white"
                                                    style="background-color: gray; text-align: left">
                                                    System Logs
                                                </p>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-xl-6"></div>
                                                <div class="col-lg-4 col-xl-3">
                                                    <center>
                                                        <a href="?logs=activity" class="btn btn-default btn-block"
                                                            style="width: 95%; border: 1px solid #e1e1e1;">
                                                            <img src="assets/5139731.png" height="65"
                                                                style="margin: 15px">
                                                            <br> Acitivy Logs
                                                        </a>
                                                    </center>
                                                </div>
                                                <div class="col-lg-3 col-xl-3">
                                                    <center>
                                                        <a href="?logs=user" class="btn btn-default btn-block"
                                                            style="width: 95%; border: 1px solid #e1e1e1;">
                                                            <img src="assets/9482401.png" height="65"
                                                                style="margin: 15px">
                                                            <br> User Logs
                                                        </a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="col-md-12">
                                                <p class="p-2 px-3 text-white"
                                                    style="background-color: gray; text-align: left">
                                                    Management
                                                </p>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-xl-6"></div>
                                                <div class="col-lg-4 col-xl-3">
                                                    <center>
                                                        <a href="?manage-account"
                                                            class="btn btn-default btn-block"
                                                            style="width: 95%; border: 1px solid #e1e1e1;">
                                                            <img src="assets/1071942.png" height="65"
                                                                style="margin: 15px">
                                                            <br> Account Management
                                                        </a>
                                                    </center>
                                                </div>

                                                <div class="col-lg-4 col-xl-3">
                                                    <center>
                                                        <a href="?list=pending" class="btn btn-default btn-block"
                                                            style="width: 95%; border: 1px solid #e1e1e1;">
                                                            <img src="assets/1187525.png" height="65"
                                                                style="margin: 15px">
                                                            <br> Master List
                                                        </a>
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
            </div>
        </div>
    </div>
</section>