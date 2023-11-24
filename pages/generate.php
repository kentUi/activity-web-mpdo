<section class="py-4">
    <div class="container px-5">
        <h1>GENERATE REPORTS</h1>
        <p>YOU CAN GENERATE OR PRINT THE REPORTS OF LOCATIONAL CLEARANCE / CERTIFICATE OF ZONING</p>
        <div class="row mt-4">
            <div class="col-md-12">

                <?php
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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <select
                                        onchange="window.location.href = '?generate-report&type=<?= $type ?>&filter=' + this.value"
                                        class="form-control">
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
                                        <option value="All">All</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Declined">Declined</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Released">Released</option>
                                    </select>
                                </div>
                                <div class="row">
                                <div class="col-md-4"><b>Status:</b></div>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="date" value="<?= date('Y-m-01') ?>" id="range_from" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <input type="date" value="<?= date('Y-m-t') ?>" id="range_to" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <button onclick="range()" style="width: 100%" class="btn btn-primary">Go</button>
                                </div>
                                <div class="col-md-2">
                                    <a href="./print.php?type=<?= $type ?>&filter=<?= $filter ?>&from=<?= $fromx ?>&to=<?= $tox ?>" target="_blank"
                                        style="width: 100%" class="btn btn-success">Print</a>
                                </div>
                            </div>
                            <script>
                                function range() {
                                    const from = document.getElementById('range_from').value;
                                    const to_date = document.getElementById('range_to').value;

                                    const link = '?generate-report&type=<?= $type ?>&filter=<?= $filter ?>&from=' + from + '&to=' + to_date;
                                    window.location.href = link;
                                }
                            </script>
                            <div class="row">
                                <div class="col-md-4"><b>From:</b></div>
                                <div class="col-md-4"><b>To:</b></div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4" style="min-height: 440px">
                        <div class="card-header" style="text-transform: uppercase; letter-spacing: 0px; ">
                            <form action="?list" method="POST">
                                <div class="row">
                                    <div class="col-md-3 mt-2">
                                        <span>Application type: <b> <br>
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
                                                $date_range = date_format(date_create($fromx), 'F d. Y') . ' - ' . date_format(date_create($tox), 'F d. Y');
                                            } else {
                                                $date_range = '-';
                                            }
                                            ?>
                                            Date Range:
                                            <b style="color: #000; letter-spacing: 2px">
                                            <br>
                                                <?= $date_range ?>
                                            </b>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['success'])) {
                                ?>
                                <div class="alert alert-success"><b>Success!</b> Application has been updated.</div>
                                <hr>
                                <?php
                            }
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Complete name</th>
                                        <th>Address</th>
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
                                                    <?= $row["citymunDesc"] . ', ' . $row["brgyDesc"] ?>
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
                    <?php
                } else {
                    ?> 
                    <div class="card" style="min-height: 340px">
                        <div class="card-body">
                            <br>
                            <div class="row mt-4 mb-4">
                                <div class="col-lg-6 col-xl-6">
                                    <center>
                                        <a href="?generate-report&type=zoning" class="btn btn-default btn-block"
                                            style="width: 95%; border: 1px solid #e1e1e1;">
                                            <img src="assets/resume.png" height="100" style="margin: 15px">
                                            <br> Application for <br> Zoning Certificate
                                        </a>
                                    </center>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <center>
                                        <a href="?generate-report&type=localize" class="btn btn-block btn-default"
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