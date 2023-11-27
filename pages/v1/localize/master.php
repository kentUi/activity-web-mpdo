<section class="py-4">
    <div class="container px-5">
        <h1>LOCATIONAL (<small>MASTER LIST</small>)</h1>
        <p>MASTER LIST FOR LOCATIONAL CLEARANCE THAT TAG AS `RELEASED`</p>
        <a href="/?manage" class="btn btn-default" style="margin-right: 10px;">
            <span class="bi bi-arrow-left"></span> &nbsp;
            Return
        </a>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" style="min-height: 440px">
                    <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">
                        <form action="/?master-localize" method="GET">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="hidden" name="master-localize" value="<?= $_GET['master-localize'] ?>">
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
                                    <th>Corporation name</th>
                                    <th width="180">Date Request</th>
                                    <th width="200" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require('./config/database.php');

                                if (isset($_GET['master-localize'])) {
                                    $list = $_GET['master-localize'];
                                    if (isset($_GET['search'])) {
                                        $search = $_GET['search'];
                                    } else {
                                        $search = '';
                                    }

                                    $sql = "SELECT * FROM t_localize_info INNER JOIN ph_citymun ON local_citymun = citymunCode INNER JOIN ph_brgy ON local_brgy = brgyCode WHERE (local_applicant LIKE '%$search%' OR local_corporation LIKE '%$search%') AND local_status = 'Released'";
                                } else {
                                    $sql = "SELECT * FROM t_localize_info INNER JOIN ph_citymun ON local_citymun = citymunCode INNER JOIN ph_brgy ON local_brgy = brgyCode WHERE local_status = 'Released'";
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
                                                <?= date_format(date_create($row['local_date']), 'F d, Y') ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="?master-localize-details&id=<?= $row['local_accid'] ?>&corp=<?= $row["local_corporation"] ?>" class="btn btn-success btn-sm">
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
