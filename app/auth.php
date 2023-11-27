<?php
error_reporting(0);
session_regenerate_id();
if (isset($_POST['register'])) {

    require('./config/database.php');
    $fname = $_POST['inp_fname'];
    $lname = $_POST['inp_lname'];
    $user = $_POST['inp_email'];
    $pwd = md5($_POST['inp_password']);
    $sql = "SELECT count(*) as i FROM t_accounts WHERE acc_email = '$user'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $row = $result->fetch_assoc();

    if ($row['i'] > 0) {
        ?>
        <script>window.location.href = './?register&exist'</script>
        <?php
    } else {
        $query = "INSERT INTO t_accounts(acc_fname, acc_lname, acc_email, acc_password,acc_type) VALUES('$fname', '$lname','$user','$pwd','0')";
        $conn->query($query);

        $sql = "SELECT count(*) as i, acc_type, acc_fname, acc_lname, acc_id, acc_email FROM t_accounts WHERE acc_email = '$user' AND acc_password = '$pwd'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        session_start();
        $_SESSION['emailID'] = $user;
        $_SESSION['loginID'] = uniqid();

        $_SESSION['typeID'] = $row['acc_type'];
        $_SESSION['fname'] = $row['acc_fname'];
        $_SESSION['lname'] = $row['acc_lname'];
        $_SESSION['id'] = $row['acc_id'];

        $date = date('Y-m-d h:i:s');

        $logs = "[REGISTRATION] New Account Registered `" . $row['acc_fname'] . ' ' . $row['acc_lname'] . "` - `" . $row['acc_email'] . "` on " . date('F d, Y') . " at " . date('h:i:s A');
        $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
        $conn->query($logs_sql);

        ?>
        <script>window.location.href = './?member'</script>
        <?php
    }

    $conn->close();
} elseif (isset($_POST['login'])) {

    require('./config/database.php');
    $user = $_POST['inp_email'];
    $pwd = md5($_POST['inp_password']);
    $sql = "SELECT count(*) as i, acc_type, acc_fname, acc_lname, acc_id FROM t_accounts WHERE acc_email = '$user' AND acc_password = '$pwd'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row['i'] != 0) {
            session_start();
            if ($pwd == md5('12345!')) {
                $_SESSION['emailID'] = $user;
                header('location: ./?login&reset');
            } else {
                $_SESSION['emailID'] = $user;
                $_SESSION['loginID'] = uniqid();
                $_SESSION['typeID'] = $row['acc_type'];
                $_SESSION['fname'] = $row['acc_fname'];
                $_SESSION['lname'] = $row['acc_lname'];
                $_SESSION['id'] = $row['acc_id'];

                $date = date('Y-m-d h:i:s');

                $logs = "[SIGN-IN] " . $row['acc_fname'] . ' ' . $row['acc_lname'] . " `Logged In` on " . date('F d, Y') . " at " . date('h:i:s A');
                $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
                $conn->query($logs_sql);

                if ($row['acc_type'] == 0) {
                    ?>
                    <script>window.location.href = '?member'</script>
                    <?php
                } else {
                    ?>
                    <script>window.location.href = '?dashboard'</script>
                    <?php
                }
            }
        } else {
            header('location: ./?login&invalid');
        }
    } else {
        echo "No results found.";
    }

    $conn->close();
} elseif (isset($_POST['reset-password'])) {

    require('./config/database.php');

    if ($_POST['inp_password2'] == $_POST['inp_password1']) {

        $user = $_POST['inp_xemail'];
        $pwd = md5($_POST['inp_password2']);
        $sql = "UPDATE t_accounts SET acc_password = '$pwd' WHERE acc_email = '$user'";

        $result = $conn->query($sql);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        if ($_POST['reset-password'] != 'byPass') {

            $_SESSION['loginID'] = uniqid();
            header('location: ./?dashboard');
        } else {
            echo 0;
        }

        $conn->close();

    } else {
        header('location: ./?login&reset&invalid');
    }
} elseif (isset($_POST['forgot'])) {
 
    $name = 'Client';
    $email = $_POST['inp_email'];
    $office = 'Municipal Planning and Development Office';

    $link = 'http://localhost/'.'?forgot&token=' . hash('SHA256', $email) . '&reset&forge=' . $email;

    $msg = 'We received a request to reset your password for your account. If you did not make this request, please ignore this email. <br><br>  Click on the following link to reset your password: ';

    $body = [
        'name' => $name,
        'email' => $email,
        'status' => 'Reset Password',
        'message' => $msg,
        'office' => $office
    ];

    $ch = curl_init('https://send-email.portalto.cloud/api/mpdo/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
    curl_setopt($ch, CURLOPT_POST, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    header('location: ../?forgot&ss');

} elseif (isset($_POST['reset-password-admin'])) {

    require('../config/database.php');

    if ($_POST['inp_password2'] == $_POST['inp_password1']) {

        $user = $_POST['inp_xemail'];
        $pwd = md5($_POST['inp_password2']);
        $sql = "UPDATE t_accounts SET acc_password = '$pwd' WHERE acc_email = '$user'";

        $result = $conn->query($sql);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        echo 0;
        $conn->close();

    } else {
        header('location: ./?login&reset&invalid');
    }
}

if (isset($_GET['logout'])) {
    session_start();

    require('../config/database.php');
    $date = date('Y-m-d h:i:s');

    $logs = "[SIGN-OUT] " . $_SESSION['fname'] . ' ' . $_SESSION['lname'] . " `Logged Out` on " . date('F d, Y') . " at " . date('h:i:s A');
    $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
    $conn->query($logs_sql);



    // Unset all session variables
    session_unset();

    // Destroy the session data
    session_destroy();

    // Expire the session cookie by setting its expiration time to the past
    setcookie(session_name(), '', time() - 3600, '/');

    header('location: ../?login');
}