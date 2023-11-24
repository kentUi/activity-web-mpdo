<body onload="window.print()">
    <section class="py-4">
        <div class="container px-5">
            <style>
                body {
                    font-family: 'Arial';
                }
            </style>

            <?php
            $load = 'window.print()';
            $logo = './assets/lgu.png';
            $style_header = "font-size: 14px; font-family: 'Arial';";
            $style_logo = "position: absolute; left: 100px; margin-top: -10px; height: 80px;";
            $style_body = "padding-left: 50px;padding-right: 50px; padding-top: 10px";

            ?>
            <center>
                <img src="<?= $logo ?>" class="img" style="<?= $style_logo ?>">
                <p style="<?= $style_header ?>">
                    REPUBLIC OF THE PHILIPPINES <br>
                    Province of Misamis Oriental <br>
                    Municipality of Tagoloan <br>
                    <b>Office of the Municipal Planning and Development Office</b>
                </p>
                <h3><b><u>LIST OF APPLICATION FOR <b style="text-transform: uppercase;"><?= $_GET['type'] ?></b> CERTIFICATION</u></b></h3>
                "<?= $_GET['filter'] ?>" Applications
            </center>
            <div class="row mt-4">
                <div class="col-md-12">
                    <?php
                    if (isset($_GET['type'])) {
                        $type = $_GET['type'];
                        ?>
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
                                                    if ($row['req_status'] == 'Approved') {
                                                        echo "Approved";
                                                    } elseif ($row['req_status'] == 'Decline') {
                                                        echo "Declined";
                                                    } elseif ($row['req_status'] == 'Release') {
                                                        echo "Released";
                                                    } else {
                                                        echo "Pending";
                                                    }
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

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d3d3d3;
        }
    </style>
</body>