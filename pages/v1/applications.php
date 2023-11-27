<?php
require('./config/database.php');

$pending_localize = "SELECT count(*) as i FROM t_localize_info WHERE local_status = 'Pending'";
$prs_localize = $conn->query($pending_localize);
$prw_localize = $prs_localize->fetch_assoc();
$pending_count_localize = $prw_localize['i'];

$pending_zone = "SELECT count(*) as i FROM t_applications WHERE req_status = 'Pending'";
$prs_zone = $conn->query($pending_zone);
$prw_zone = $prs_zone->fetch_assoc();
$pending_count_zone = $prw_zone['i'];

?>
<section class="py-4">
    <div class="container px-5">
        <h1>APPLICATIONS</h1>
        <p>ZONING AND LOCATIONAL CERTIFICATE</p>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card" style="min-height: 3  50px;">
                        <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">
                            Menu
                        </div>
                        <br>
                        <div class="card-body" style=" padding-top: 0px">
                            <div class="row mt-4 mb-4">
                                <div class="col-lg-6 col-xl-2"></div>
                                <div class="col-lg-6 col-xl-4">
                                    <center>
                                        <a href="?menu-zoning" class="btn btn-default btn-block"
                                            style="width: 95%; border: 1px solid #e1e1e1;">
                                            <img src="assets/resume.png" height="100" style="margin: 15px">
                                            <br> Application for <br> Zoning Certificate <br>
                                            Pending Count : <b>(
                                                <span class="badge bg-danger"><?= number_format($pending_count_zone, 0) ?></span> )
                                            </b>
                                        </a>
                                    </center>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <center>
                                        <a href="?menu-localize" class="btn btn-block btn-default"
                                            style="width: 95%; border: 1px solid #e1e1e1">
                                            <img src="assets/job.png" height="100" style="margin: 15px">
                                            <br>
                                            Application for <br> Locational Certificate <br>
                                            Pending Count : <b>(
                                                <span class="badge bg-danger"><?= number_format($pending_count_localize, 0) ?></span> )
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