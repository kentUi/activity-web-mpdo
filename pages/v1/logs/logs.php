<section class="py-4">
    <div class="container px-5">
        <h1 style="text-transform: uppercase;">
            <?= $_GET['logs'] ?> LOGS
        </h1>
        <p>YOU CAN VIEW THE ACTIVITY AND USER LOGS HERE</p>
        <a href="/?manage" class="btn btn-default" style="margin-right: 10px;">
            <span class="bi bi-arrow-left"></span> &nbsp;
            Return
        </a>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" style="min-height: 440px">
                    <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">
                        <form action="/?logs" method="GET">
                            <div class="row">
                                <div class="col-md-9">
                                    <input name="search" placeholder="Search logs here.." type="text"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <button style="width: 100%" class="btn btn-block btn-primary">Search
                                        Logs</button>
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
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require('./config/database.php');

                                if ($_GET['logs'] == 'user') {
                                    $sql = "SELECT *FROM t_logs WHERE logs_details like '[SIGN-%' ORDER BY logs_id DESC";
                                } else {
                                    $sql = "SELECT *FROM t_logs WHERE logs_details NOT LIKE '[SIGN%' ORDER BY logs_id DESC";
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
                                                <?= $row['logs_details'] ?>.
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '';
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