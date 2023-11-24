<?php
$type = $_POST['type'];
if ($type == 3) {
    include('../modals/view.php');
} elseif ($type == 1) {
    ?>
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
    <?php
} elseif ($type == 5) {
    ?>
    <br>
    <center>
        <div class="ask">
            <img src="/assets/6195699.png" height="100">
            <h4>Do you really want to <br> Reset Password ? </h4>
            <br>
            <button onclick="reset_password('<?= $_POST['id'] ?>')" class="btn btn-success btn-sm"
                style="margin-right: 10px;">
                Yes, Please proceed
            </button>
            <button class="btn btn-default btn-sm" data-bs-dismiss="modal" aria-label="Close">
                No, I Change my mind
            </button>
        </div>
        <div id="ask_reset" style="display: none">
            <img src="/assets/double-check.png" height="100">
            <h4>Password Reset! <br> <i><small>The password was reset.</small></i> </h4>
        </div>
    </center>
    <br>
    <?php

} elseif ($type == 4) {

    require('../config/database.php');
    $id = $_POST['id'];
    $sql = "SELECT *FROM t_accounts WHERE acc_id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <form action="?manage-account" method="POST" autocomplete="off">
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="hidden" name="inp_id" value="<?= $id ?>">
                    <input class="form-control" id="name" required name="inp_fname" type="text"
                        placeholder="Enter your name..." value="<?= $row['acc_fname'] ?>" data-sb-validations="required" />
                    <label for="name">First Name</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="hidden" name="inp_id" value="<?= $id ?>">
                    <input class="form-control" id="name" required name="inp_lname" type="text"
                        placeholder="Enter your name..." value="<?= $row['acc_lname'] ?>" data-sb-validations="required" />
                    <label for="name">Last Name</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input class="form-control" id="name" required name="inp_username" type="email"
                        placeholder="Enter your name..." value="<?= $row['acc_email'] ?>" data-sb-validations="required" />
                    <label for="name">Username / Email Address</label>
                </div>
            </div>
            <div class="col-md-12 ">
                <button name="sbmt-update" class="btn btn-success btn-md" style="width: 100%">Save Changes</button>
            </div>
            <div class="col-md-12 mt-2">
                <a href="?manage-account&delete-account-confirmation=<?= $id ?>" name="sbmt-delete"
                    class="btn bg-light btn-sm" style="width: 100%">Delete Account Permanently</a>
            </div>
        </div>
    </form>
    <?php
}
?>