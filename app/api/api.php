<?php 
require('../../config/database.php');

session_start();
date_default_timezone_set('Asia/Manila');

$user = $_SESSION['emailID'];
$sql = "SELECT * FROM t_accounts WHERE acc_email = '$user'";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$row = $result->fetch_assoc();

if(isset($_GET['zone-approval'])){

    $id = $_GET['id'];
    $name = $_GET['name'];

    $date = date('Y-m-d h:i:s');

    $logs = "[ZONING] " . $row['acc_fname'] . ' ' . $row['acc_lname']  . " granted `APPROVAL` to the application of " . $name . " on " . date('F d, Y') . ", at ". date('h:i:s A');
    $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
    $conn->query($logs_sql);

    $application = "UPDATE t_applications SET req_status = 'Approved', req_by = '".$row['acc_fname'] . ' ' . $row['acc_lname'] ."' WHERE req_id = '$id'";
    $conn->query($application);

    header('location: /?zoning&id=' . $id);

}

if(isset($_GET['zone-decline'])){

    $id = $_GET['id'];
    $name = $_GET['name'];
    $reason = $_GET['reason'];

    $date = date('Y-m-d h:i:s');
    
    $by = $_SESSION['id'];

    $logs = "[ZONING] " . $row['acc_fname'] . ' ' . $row['acc_lname']  . " `DECLINED` the application of " . $name . " due to `$reason` on " . date('F d, Y') . ", at ". date('h:i:s A');
    $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
    $conn->query($logs_sql);

    $reason_sql = "INSERT INTO t_reasons(rs_appid, rs_details, rs_by, rs_type created_at) VALUES('$id','$reason','$date','$by','zoning')";
    $conn->query($reason_sql);

    $application = "UPDATE t_applications SET req_status = 'Declined', req_by = '". $row['acc_fname'] . ' ' . $row['acc_lname'] ."' WHERE req_id = '$id'";
    $conn->query($application);

    header('location: /?zoning&id=' . $id);

}

if(isset($_GET['zone-complete'])){

    $id = $_GET['id'];
    $name = $_GET['name'];
    $datex = $_GET['date'];

    $date = date('Y-m-d h:i:s');

    $logs = "[ZONING] " . $row['acc_fname'] . ' ' . $row['acc_lname']  . " marked the application of " . $name . " as `COMPLETED` on " . date('F d, Y') . ", at ". date('h:i:s A');
    $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
    $conn->query($logs_sql);

    $application = "UPDATE t_applications SET req_status = 'Completed', req_by = '". $row['acc_fname'] . ' ' . $row['acc_lname'] ."', req_tobeclaim = '$datex' WHERE req_id = '$id'";
    $conn->query($application);

    header('location: /?zoning&id=' . $id);

}

if(isset($_GET['zone-release'])){

    $id = $_GET['id'];
    $name = $_GET['name'];

    $date = date('Y-m-d h:i:s');

    $logs = "[ZONING] " . $row['acc_fname'] . ' ' . $row['acc_lname'] . " `RELEASED` the application of " . $name . " on " . date('F d, Y') . ", at ". date('h:i:s A');
    $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
    $conn->query($logs_sql);

    $application = "UPDATE t_applications SET req_status = 'Released', req_by = '". $row['acc_fname'] . ' ' . $row['acc_lname'] ."' WHERE req_id = '$id'";
    $conn->query($application);

    header('location: /?zoning&id=' . $id);

}

// ******************* Localize API ***********************************************

if(isset($_GET['localize-approval'])){

    $id = $_GET['id'];
    $name = $_GET['name'];

    $date = date('Y-m-d h:i:s');

    $logs = "[ZONING] " . $row['acc_fname'] . ' ' . $row['acc_lname']  . " granted `APPROVAL` to the application of " . $name . " on " . date('F d, Y') . ", at ". date('h:i:s A');
    $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
    $conn->query($logs_sql);

    $application = "UPDATE t_localize_info SET local_status = 'Approved', local_by = '".$row['acc_fname'] . ' ' . $row['acc_lname'] ."' WHERE local_id = '$id'";
    $conn->query($application);

    header('location: /?local&id=' . $id);

}

if(isset($_GET['localize-decline'])){

    $id = $_GET['id'];
    $name = $_GET['name'];
    $reason = $_GET['reason'];

    $by = $_SESSION['id'];

    $date = date('Y-m-d h:i:s');

    $logs = "[LOCATIONAL] " . $row['acc_fname'] . ' ' . $row['acc_lname']  . " `DECLINED` the application of " . $name . " due to `$reason` on " . date('F d, Y') . ", at ". date('h:i:s A');
    $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
    $conn->query($logs_sql);

    $reason_sql = "INSERT INTO t_reasons(rs_appid, rs_details, rs_by, rs_type created_at) VALUES('$id','$reason','$date','$by','localize')";
    $conn->query($reason_sql);

    $application = "UPDATE t_localize_info SET local_status = 'Declined', local_by = '". $row['acc_fname'] . ' ' . $row['acc_lname'] ."' WHERE local_id = '$id'";
    $conn->query($application);

    header('location: /?local&id=' . $id);

}

if(isset($_GET['localize-complete'])){

    $id = $_GET['id'];
    $name = $_GET['name'];
    $datex = $_GET['date'];

    $date = date('Y-m-d h:i:s');

    $logs = "[LOCATIONAL] " . $row['acc_fname'] . ' ' . $row['acc_lname']  . " marked the application of " . $name . " as `COMPLETED` on " . date('F d, Y') . ", at ". date('h:i:s A');
    $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
    $conn->query($logs_sql);

    $application = "UPDATE t_localize_info SET local_status = 'Completed', local_by = '". $row['acc_fname'] . ' ' . $row['acc_lname'] ."', local_tobeclaim = '$datex' WHERE local_id = '$id'";
    $conn->query($application);

    header('location: /?local&id=' . $id);

}

if(isset($_GET['localize-release'])){

    $id = $_GET['id'];
    $name = $_GET['name'];

    $date = date('Y-m-d h:i:s');

    $logs = "[LOCATIONAL] " . $row['acc_fname'] . ' ' . $row['acc_lname'] . " `RELEASED` the application of " . $name . " on " . date('F d, Y') . ", at ". date('h:i:s A');
    $logs_sql = "INSERT INTO t_logs(logs_details, created_at) VALUES('$logs','$date')";
    $conn->query($logs_sql);

    $application = "UPDATE t_localize_info SET local_status = 'Released', local_by = '". $row['acc_fname'] . ' ' . $row['acc_lname'] ."' WHERE local_id = '$id'";
    $conn->query($application);

    header('location: /?local&id=' . $id);

}
?>