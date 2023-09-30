<?php
if (isset($_POST['inp_email'])) {

    require('./config/database.php');
    $user = $_POST['inp_email'];
    $pwd = md5($_POST['inp_password']);
    $sql = "SELECT count(*) as i FROM t_accounts WHERE acc_email = '$user' AND acc_password = '$pwd'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['i'] != 0) {
            session_start();
            $_SESSION['loginID'] = uniqid();
            header('location: ./?dashboard');
        } else {
            header('location: ./?login&invalid');
        }
    } else {
        echo "No results found.";
    }

    $conn->close();
}

if (isset($_GET['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header('location: ../?login');
}