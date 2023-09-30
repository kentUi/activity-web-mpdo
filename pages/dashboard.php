<section class="py-4">
    <div class="container px-5">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-white rounded-4 py-4 px-4 px-md-4" style="border-left: 20px solid #3498db; letter-spacing: 2px; max-height: 138px">
                    <h2 class="text-dark"><b>0</b></h2>
                    <h3 class="text-dark">PENDING</h3>
                    <img style="position: relative; top: -80px; left: 190px;" src="./assets/expired.png" class="img" height="80" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white rounded-4 py-4 px-4 px-md-4" style="border-left: 20px solid #d35400; letter-spacing: 2px; max-height: 138px">
                    <h2 class="text-dark"><b>0</b></h2>
                    <h3 class="text-dark">DENIED</h3>
                    <img style="position: relative; top: -80px; left: 190px;" src="./assets/denied.png" class="img" height="80" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white rounded-4 py-4 px-4 px-md-4" style="border-left: 20px solid #2ecc71; letter-spacing: 2px; max-height: 138px">
                    <h2 class="text-dark"><b>0</b></h2>
                    <h3 class="text-dark">RELEASE</h3>
                    <img style="position: relative; top: -80px; left: 190px;" src="./assets/done.png" class="img" height="80" alt="">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" style="min-height: 350px">
                    <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">List of Request
                    </div>
                    <div class="card-body">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Complete name</th>
                                    <th>Address</th>
                                    <th width="180">Date Request</th>
                                    <th width="80" class="text-center">Status</th>
                                    <th width="100" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require('./config/database.php');
                                $sql = "SELECT *FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode";

                                $result = $conn->query($sql);

                                if (!$result) {
                                    die("Query failed: " . $conn->error);
                                }
                                $num = 1;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?= $num++ ?>.</td>
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
                                                <?= $row['req_status'] ?>
                                            </td>
                                            <td class="text-center">
                                                <button data-bs-toggle="modal" data-bs-target="#myModal"
                                                    class="btn btn-success btn-sm" onclick="view(3, <?= $row['req_id'] ?>)">View</button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "No results found.";
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
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>

    <script>
        function view(type, id) {
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
    </script>