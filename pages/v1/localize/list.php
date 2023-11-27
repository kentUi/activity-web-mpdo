<section class="py-4">
    <div class="container px-5">
        <h1>LOCATIONAL CERTIFICATION</h1>
        <p>APPLICATION FOR LOCATIONAL CLEARANCE OF APPLICANT</p>
        <a href="/?menu-localize" class="btn btn-default" style="margin-right: 10px;">
            <span class="bi bi-arrow-left"></span> &nbsp;
            Return
        </a>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" style="min-height: 440px">
                    <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">
                        <form action="/?list-localize" method="GET">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="hidden" name="list-localize" value="<?= $_GET['list-localize'] ?>">
                                    <input name="search" placeholder="Search application here.." type="text"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <button style="width: 100%" class="btn btn-block btn-primary">Search
                                        Request</button>
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
                                    <th width="100" class="text-center">Status</th>
                                    <th width="200" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require('./config/database.php');

                                if (isset($_GET['list-localize'])) {
                                    $list = $_GET['list-localize'];
                                    if (isset($_GET['search'])) {
                                        $search = $_GET['search'];
                                    } else {
                                        $search = '';
                                    }

                                    $sql = "SELECT * FROM t_localize_info INNER JOIN ph_citymun ON local_citymun = citymunCode INNER JOIN ph_brgy ON local_brgy = brgyCode WHERE local_status LIKE '$list' AND (local_applicant LIKE '%$search%' OR local_corporation LIKE '%$search%')";
                                } else {
                                    $sql = "SELECT * FROM t_localize_info INNER JOIN ph_citymun ON local_citymun = citymunCode INNER JOIN ph_brgy ON local_brgy = brgyCode";
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
                                                <center>
                                                    <?php
                                                    if ($row['local_status'] == 'Pending') {
                                                        ?>
                                                        <span class="badge bg-warning">Pending</span>
                                                        <?php
                                                    } elseif ($row['local_status'] == 'Approved') {
                                                        ?>
                                                        <span class="badge bg-primary">Approved</span>
                                                        <?php
                                                    } elseif ($row['local_status'] == 'Declined') {
                                                        ?>
                                                        <span class="badge bg-danger">Declined</span>
                                                        <?php
                                                    } elseif ($row['local_status'] == 'Completed') {
                                                        ?>
                                                        <span class="badge bg-info">Completed</span>
                                                        <?php
                                                    } elseif ($row['local_status'] == 'Released') {
                                                        ?>
                                                        <span class="badge bg-success">Released</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </center>
                                            </td>
                                            <td class="text-center">
                                                <a href="?local&id=<?= $row['local_id'] ?>" class="btn btn-success btn-sm">
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

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <span style="margin-right: 20px" id="step_1">
                    <button onclick="link_decline()" class="btn btn-danger">Decline</button>
                    <button onclick="link_approved()" class="btn btn-primary">Approved</button>
                </span>
                <span style="margin-right: 20px; display: none;" id="step_2">
                    <button onclick="link_release()" class="btn btn-success">Release</button>
                </span>
                | &emsp;
                <h5 class="modal-title" id="exampleModalLabel">Application Details</h5>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>

    <input type="hidden" id="list_id">

    <script>
        function view(type, id, status) {
            if (status === "Approved") {
                document.getElementById('step_1').style.display = 'none';
                document.getElementById('step_2').style.display = 'block';
            }
            document.getElementById('list_id').value = id;
            if (type == 3) {
                document.getElementById('exampleModalLabel').innerHTML = 'View Application Details';
            }
            $.ajax({
                method: "POST",
                url: './app/operator.php',
                data: { "type": type, 'id': id },
            })
                .done(function (response) {
                    $(".modal-body").html(response);

                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.error("Request failed:", textStatus, errorThrown);
                });
        }

        function link_release() {
            const link = document.getElementById('list_id').value;
            window.location.href = '/MPDO-INFOMNGTSYS/app/transaction.php?release=' + link;
        }

        function link_approved() {
            const link = document.getElementById('list_id').value;
            window.location.href = '/MPDO-INFOMNGTSYS/app/transaction.php?approved=' + link;
        }

        function link_decline() {
            const link = document.getElementById('list_id').value;
            window.location.href = '/MPDO-INFOMNGTSYS/app/transaction.php?decline=' + link;
        }
    </script>