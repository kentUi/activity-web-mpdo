<section class="py-4">
    <div class="container px-5">
        <h1>ZONING (<small>MASTER LIST</small>)</h1>
        <p>MASTER LIST FOR ZONING CLEARANCE THAT TAG AS `RELEASED`</p>
        <a href="/?manage" class="btn btn-default" style="margin-right: 10px;">
            <span class="bi bi-arrow-left"></span> &nbsp;
            Return
        </a>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" style="min-height: 440px">
                    <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">
                        <form action="/?master-zoning" method="GET">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="hidden" name="master-zoning" value="<?= $_GET['master-zoning'] ?>">
                                    <input name="search" placeholder="Search application here.." type="text"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <button style="width: 100%" class="btn btn-block btn-primary">Search
                                        </button>
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
                                    <th>Applicant name</th>
                                    <th width="180">Date Request</th>
                                    <th width="200" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require('./config/database.php');

                                if (isset($_GET['master-zoning'])) {
                                    $list = $_GET['master-zoning'];
                                    if (isset($_GET['search'])) {
                                        $search = $_GET['search'];
                                    } else {
                                        $search = '';
                                    }

                                    $sql = "SELECT * FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode  WHERE (req_firstName LIKE '%$search%' OR req_lastName LIKE '%$search%' OR req_owner LIKE '%$search%') AND req_status = 'Released'";
                                } else {
                                    $sql = "SELECT * FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode WHERE req_status = 'Released'";
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
                                                <a href="?master-zoning-details&id=<?= $row['req_accid'] ?>&name=<?= $row["req_lastName"] . ', ' . $row["req_firstName"] ?>" class="btn btn-success btn-sm">
                                                    <span class="bi bi-eye"></span> &nbsp;
                                                    View
                                                </a>

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
</section>
