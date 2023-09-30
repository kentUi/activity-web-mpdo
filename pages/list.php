<section class="py-4">
    <div class="container px-5">
        <h1>APPLICATION FOR ZONING CERTIFICATION</h1>
        <p>APPLICATION FOR LOCATIONAL CLEARANCE/ CERTIFICATE OF ZONING COMPLIANCE NAME OF APPLICANT</p>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" style="min-height: 440px">
                    <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">
                        <div class="row">
                            <div class="col-md-9">
                                <input placeholder="Search application here.." type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <button style="width: 100%" class="btn btn-block btn-primary">Search Request</button>
                            </div>
                        </div>
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
                                    <th width="220" class="text-center">Action</th>
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
                                                <?= $row['req_status'] ?>
                                            </td>
                                            <td class="text-center">
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    class="btn btn-warning btn-sm">Edit</button>
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                                <button data-bs-toggle="modal" data-bs-target="#myModal"
                                                    class="btn btn-success btn-sm"
                                                    onclick="view(3, <?= $row['req_id'] ?>)">View</button>
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