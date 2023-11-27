<section class="py-4">
    <div class="container px-5">
        <h1>GENERATE REPORTS</h1>
        <p>YOU CAN GENERATE OR PRINT THE REPORTS OF CLEARANCES</p>
        <a href="/?generate-report" class="btn btn-default" style="margin-right: 10px;">
            <span class="bi bi-arrow-left"></span> &nbsp;
            Return
        </a>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <?php
                        error_reporting(0);
                        if (isset($_GET['type'])) {
                            $type = $_GET['type'];
                            if (isset($_GET['filter'])) {
                                $filter = $_GET['filter'];
                            } else {
                                $filter = 'All';
                            }
                            if (isset($_GET['from'])) {
                                $fromx = $_GET['from'];
                                $tox = $_GET['to'];
                            } else {
                                $fromx = '';
                                $tox = '';
                            }
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    Reports
                                </div>
                                <div class="card-body" style="min-height: 600px;">
                                    <form action="?list" method="POST">
                                        <div class="row">
                                            <div class="col-md-3 mt-2">
                                                <span>Application type: <b style="text-transform: Capitalize"> <br>
                                                        <?= $type ?>
                                                    </b></span>
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <span>
                                                    Application Status:
                                                    <b style="color: #000">
                                                        <br>
                                                        <?= $filter ?>
                                                    </b>
                                                </span>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <span>
                                                    <?php
                                                    if (isset($_GET['from'])) {
                                                        $fromx = $_GET['from'];
                                                        $tox = $_GET['to'];
                                                        $date_range = date_format(date_create($fromx), 'M. d, Y') . ' - ' . date_format(date_create($tox), 'M. d, Y');
                                                    } else {
                                                        $date_range = '-';
                                                    }
                                                    ?>
                                                    Date Range:
                                                    <b style="color: #000;">
                                                        <br>
                                                        <?= $date_range ?>
                                                    </b>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Complete name</th>
                                                <th width="180">Date Request</th>
                                                <th width="80" class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require('./config/database.php');

                                            if (isset($_GET['filter'])) {
                                                $search = $_GET['filter'];
                                                if ($search == "All") {
                                                    if (isset($_GET['from'])) {
                                                        $from = $_GET['from'];
                                                        $to = $_GET['to'];
                                                        $sql = "SELECT *FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode WHERE req_date BETWEEN '$from' AND '$to'";
                                                    } else {
                                                        $sql = "SELECT * FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode";
                                                    }
                                                } else {
                                                    if (isset($_GET['from'])) {
                                                        $from = $_GET['from'];
                                                        $to = $_GET['to'];
                                                        $sql = "SELECT * FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode WHERE req_status = '$search' AND req_date BETWEEN '$from' AND '$to'";
                                                    } else {
                                                        $sql = "SELECT * FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode WHERE req_status = '$search'";
                                                    }
                                                }
                                            } else {
                                                $sql = "SELECT *FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode";
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
                                                            <?= $row["req_lastName"] . ', ' . $row["req_firstName"] ?>
                                                        </td>

                                                        <td>
                                                            <?= date_format(date_create($row['req_date']), 'F d, Y') ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                            echo $row['req_status'];
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo 'No results found. <b style="color: red">"' . $search . '" </b><hr>';
                                            }

                                            $conn->close();
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Options
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!--  -->
                                                    <select class="form-control" id="option_filter">
                                                        <?php
                                                        if (isset($_GET['filter'])) {
                                                            $filter = $_GET['filter'];
                                                            ?>
                                                            <option value="<?= $filter ?>" selected>
                                                                <?= $filter ?>
                                                            </option>
                                                            <option value="" disabled>--FILTER BY STATUS --</option>
                                                            <?php
                                                        } else {
                                                            $filter = 'All';
                                                            ?>
                                                            <option value="" disabled selected>--FILTER BY STATUS --</option>
                                                            <?php
                                                        }
                                                        ?>
                                                        <option value="All" selected>All</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Declined">Declined</option>
                                                        <option value="Approved">Approved</option>
                                                        <option value="Completed">Completed</option>
                                                        <option value="Released">Released</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 mt-2">
                                                    <input type="date" value="<?= date('Y-m-01') ?>" id="range_from"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <input type="date" value="<?= date('Y-m-t') ?>" id="range_to"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <button onclick="range()" style="width: 100%"
                                                        class="btn btn-primary">Go</button>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <a href="./pages/v1/zoning/print.php?type=<?= $type ?>&filter=<?= $filter ?>&from=<?= $fromx ?>&to=<?= $tox ?>"
                                                        target="_blank" style="width: 100%"
                                                        class="btn btn-success">Print</a>
                                                </div>
                                            </div>
                                            <script>
                                                function range() {
                                                    const filter = document.getElementById('option_filter').value;
                                                    const from = document.getElementById('range_from').value;
                                                    const to_date = document.getElementById('range_to').value;

                                                    const link = '?generate-reports-zonings-zoning&type=<?= $type ?>&filter=' + filter + '&from=' + from + '&to=' + to_date;
                                                    window.location.href = link;
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-4">
                                <div class="card-header">
                                    Quick Links
                                </div>
                                <div class="card-body">
                                    <div class="d-grid">
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
                                        <ul>
                                            <li>
                                                <a href="?generate-reports-zoning&type=<?= $type ?>&filter=All"
                                                    class="btn btn-default btn-block" style="text-align: left;">
                                                    All - (<?= number_format($pending_count + $approved_count + $decline_count + $completed_count + $release_count, 0) ?>)
                                                </a>
                                            </li>
                                            <li>
                                                <a href="?generate-reports-zoning&type=<?= $type ?>&filter=Pending"
                                                    class="btn btn-default btn-block" style="text-align: left;">
                                                    Pending - (<?= number_format($pending_count, 0) ?>)
                                                </a>
                                            </li>
                                            <li>
                                                <a href="?generate-reports-zoning&type=<?= $type ?>&filter=Approved"
                                                    class="btn btn-default btn-block" style="text-align: left;">
                                                    Approved - (<?= number_format($approved_count, 0) ?>)
                                                </a>
                                            </li>
                                            <li>
                                                <a href="?generate-reports-zoning&type=<?= $type ?>&filter=Declined"
                                                    class="btn btn-default btn-block" style="text-align: left;">
                                                    Declined - (<?= number_format($decline_count, 0) ?>)
                                                </a>
                                            </li>
                                            <li>
                                                <a href="?generate-reports-zoning&type=<?= $type ?>&filter=Completed"
                                                    class="btn btn-default btn-block" style="text-align: left;">
                                                    Completed - (<?= number_format($completed_count, 0) ?>)
                                                </a>
                                            </li>
                                            <li>
                                                <a href="?generate-reports-zoning&type=<?= $type ?>&filter=Released"
                                                    class="btn btn-default btn-block" style="text-align: left;">
                                                    Released - (<?= number_format($release_count, 0) ?>)
                                                </a>
                                            </li>
                                        </ul>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        } else {
                            ?>
                    <div class="card" style="min-height: 340px">
                        <div class="card-body">
                            <br>
                            <div class="row mt-4 mb-4">
                                <div class="col-lg-6 col-xl-6">
                                    <center>
                                        <a href="?generate-reports-zoning&type=zoning" class="btn btn-default btn-block"
                                            style="width: 95%; border: 1px solid #e1e1e1;">
                                            <img src="assets/resume.png" height="100" style="margin: 15px">
                                            <br> Application for <br> Zoning Certificate
                                        </a>
                                    </center>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <center>
                                        <a href="?generate-reports-zoning&type=localize" class="btn btn-block btn-default"
                                            style="width: 95%; border: 1px solid #e1e1e1">
                                            <img src="assets/job.png" height="100" style="margin: 15px">
                                            <br>
                                            Application for <br> Locational/Certificate of Zoning
                                        </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        ?>
            </div>
        </div>
    </div>
</section>