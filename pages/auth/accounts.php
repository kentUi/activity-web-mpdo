<section class="py-4">
    <div class="container px-5">
        <h1>MANAGE ACCOUNTS</h1>
        <p>YOU CAN SEARCH AND CREATE FOR THE STAFF ACCOUNTS</p>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" style="min-height: 440px">
                    <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">
                        <form action="?manage-account" method="POST">
                            <div class="row">
                                <div class="col-md-8">
                                    <input name="search" placeholder="Search account here.." type="text"
                                        class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <button style="width: 100%" class="btn btn-block btn-primary">Search
                                        Account</button>
                                </div>

                                <div class="col-md-2">
                                    <button type="button" style="width: 100%" data-bs-toggle="modal"
                                        data-bs-target="#myModal_edit"  onclick="view(1, 0 ,'edit')" class="btn btn-block btn-info">New Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['delete-account-confirmation'])) {

                            require('./config/database.php');
                            $id = $_GET['delete-account-confirmation'];
                            $sql = "SELECT *FROM t_accounts WHERE acc_id = '$id'";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>
                            <br>
                            <center>
                                <h4>
                                    Do you really want to remove this account ? <br>
                                    "<b style="color: red">
                                        <?= $row['acc_email'] ?>
                                    </b>"
                                </h4>
                                <h1 style="font-size: 72px;">❓</h1><br>
                                <a href="?manage-account&delete=<?= $id ?>" class="btn btn-success">Yes, I confirm.</a>
                                <a href="?manage-account" class="btn btn-danger">No, I Change my mind.</a>
                            </center>
                            <?php
                        } else {
                            ?>
                            <?php
                            if (isset($_GET['success'])) {
                                ?>
                                <div class="alert alert-success"><b>New</b> Account has been Added.</div>
                                <hr>
                                <?php
                            } elseif (isset($_GET['updated'])) {
                                ?>
                                <div class="alert alert-success"><b>Success!</b> Account has been Updated.</div>
                                <hr>
                                <?php
                            } elseif (isset($_GET['deleted'])) {
                                ?>
                                <div class="alert alert-success"><b>Success!</b> Account has been Deleted.</div>
                                <hr>
                                <?php
                            } elseif (isset($_GET['reset'])) {
                                require('./config/database.php');
                                $id = $_GET['reset'];
                                $sql = "SELECT *FROM t_accounts WHERE acc_id = '$id'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();

                                $password = md5('12345!');
                                $reset = "UPDATE t_accounts SET acc_password = '$password' WHERE acc_id = '$id'";

                                if ($conn->query($reset) === TRUE) {
                                    
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                                ?>
                                <div class="alert alert-success"><b>Account Details: </b>
                                    <?= $row['acc_email'] ?>
                                    <br> <b>Password Reset: </b> "<b>12345!</b>" <small><i>(Automatically Required New Password After loggin)</i></small>
                                </div>
                                <hr>
                                <?php
                            }
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th width="200" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require('./config/database.php');

                                    if (isset($_POST['search'])) {
                                        $search = $_POST['search'];
                                        $sql = "SELECT *FROM t_accounts WHERE (acc_fname LIKE '%$search%' OR acc_lname LIKE '%$search%' OR acc_email LIKE '%$search%')";
                                    } else {
                                        $sql = "SELECT *FROM t_accounts";
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
                                                    <?= $row["acc_fname"] ?> <?= $row["acc_lname"] ?>
                                                </td>
                                                <td>
                                                    <?= $row["acc_email"] ?>
                                                </td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#myModal_edit" onclick="view(4, <?= $row['acc_id'] ?>,'edit')">
                                                            View
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#myModal_edit"
                                                            onclick="view(5, '<?= $row['acc_email'] ?>', 'reset')">
                                                            Reset Password
                                                        </button>
                                                    </center>
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
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register Account</h5>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" required name="inp_name" type="text"
                                    placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Complete Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" required name="inp_username" type="email"
                                    placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Username / Email Address</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" required name="inp_password" type="password"
                                    placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Enter Password</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success btn-lg" style="width: 100%">Submit Registration</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal_edit" tabindex="-1" aria-labelledby="x" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="x">Account Management</h5>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>


<script>
    function view(type, id) {
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

    function reset_password(id) {
        $.ajax({
            method: "POST",
            url: './app/auth.php',
            data: { 
                "reset-password-admin": 'byPass',
                'inp_password1': '12345!',
                'inp_password2': '12345!',
                'inp_xemail': id
            },
        })
            .done(function (response) {
                $(".ask").html('<img src="/assets/double-check.png" height="100"><h4>Password Reset! <br> <i><small>The password was reset.</small></i> </h4>');
                document.getElementById('ask').style.display = 'none';
                document.getElementById('ask_reset').style.display = 'block';
                console.log(response)
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Request failed:", textStatus, errorThrown);
            });
    }
</script>

<?php
if (isset($_POST['inp_password'])) {

    require('./config/database.php');

    $name = $_POST['inp_name'];
    $username = $_POST['inp_username'];
    $password = md5($_POST['inp_password']);

    $sql = "INSERT INTO t_accounts ( acc_name, acc_email, acc_password, 'acc_type') VALUES ( '$name', '$username', '$password', '1')";

    if ($conn->query($sql) === TRUE) {
        ?>
        <script>window.location.href = '?manage-account&success';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_POST['sbmt-update'])) {
    require('./config/database.php');
    $id = $_POST['inp_id'];
    $fname = $_POST['inp_fname'];
    $lname = $_POST['inp_lname'];
    $username = $_POST['inp_username'];

    $sql = "UPDATE t_accounts SET acc_fname = '$fname', acc_lname = '$lname', acc_email = '$username' WHERE acc_id = '$id'";

    if ($conn->query($sql) === TRUE) {
        ?>
        <script>window.location.href = '?manage-account&updated';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete'])) {
    require('./config/database.php');
    $id = $_GET['delete'];

    $sql = "DELETE FROM t_accounts WHERE acc_id = '$id'";
    if ($conn->query($sql) === TRUE) {
        ?>
        <script>window.location.href = '?manage-account&deleted';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>