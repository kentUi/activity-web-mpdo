<?php
require('./config/database.php');
?>
<section class="py-4">
    <div class="container px-5">
        <h1>CLIENT INFORMATION</h1>
        <p>MASTER LIST FOR LOCATIONAL CLEARANCE THAT TAG AS `RELEASED`</p>
        <a href="/?master-localize" class="btn btn-default" style="margin-right: 10px;">
            <span class="bi bi-arrow-left"></span> &nbsp;
            Return
        </a>
        <div class="row mt-3">

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card" style="min-height: 300px">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="/assets/avatar.png" height="120" style="float: right;" class="mt-3">
                                    <br>
                                </div>
                                <div class="col-md-10">
                                    <br>
                                    <h3>
                                        <?= $_GET['corp'] ?>
                                    </h3>
                                    <p>Details of provide from previous request.</p>
                                    <hr>
                                    <div class="col-md-12">
                                        <p class="p-2 px-3 text-white" style="background-color: gray; text-align: left">
                                            List for Locational Certificate
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
                                                $id = $_GET['id'];
                                                $sql = "SELECT * FROM t_localize_info INNER JOIN ph_citymun ON local_citymun = citymunCode INNER JOIN ph_brgy ON local_brgy = brgyCode WHERE local_accid = '$id' AND local_status = 'Released'";

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
                                                                <a target="_blank" href="?local&id=<?= $row['local_id'] ?>&type=local"
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