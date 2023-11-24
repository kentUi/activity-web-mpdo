<?php
require('../config/database.php');

if (isset($_GET['approved'])) {
    $id = $_GET['approved'];

    $sql = "UPDATE t_applications SET req_status = 'Approved' WHERE req_id = '$id'";

    $info = "SELECT *FROM t_applications WHERE req_id = '$id'";
    $info_result = $conn->query($info);
    $info_row = $info_result->fetch_assoc();

    $msg = 'We are pleased to inform you that your application has been approved! Congratulations on your successful application. If you have any further questions or need assistance, please dont hesitate to contact us.';

    $name = $info_row['req_lastName'] . ', ' . $info_row['req_firstName'];
    $email = $info_row['req_email'];
    $office = 'Municipal Planning and Development Office';

    $body = [
        'name' => $name,
        'email' => $email,
        'status' => 'Approved',
        'message' => $msg,
        'office' => $office
    ];

    $ch = curl_init('https://send-email.portalto.cloud/api/mpdo/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
    curl_setopt($ch, CURLOPT_POST, 1);
    $response = curl_exec($ch);
    curl_close($ch);


    if ($conn->query($sql) === TRUE) {
        header('location: ../?list&success');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} elseif (isset($_GET['decline'])) {
    $id = $_GET['decline'];

    $sql = "UPDATE t_applications SET req_status = 'Decline' WHERE req_id = '$id'";

    $info = "SELECT *FROM t_applications WHERE req_id = '$id'";
    $info_result = $conn->query($info);
    $info_row = $info_result->fetch_assoc();

    $msg = 'We regret to inform you that your application has been denied. If you have any questions or would like more information regarding the denial, please feel free to reach out to our support team.';

    $name = $info_row['req_lastName'] . ', ' . $info_row['req_firstName'];
    $email = $info_row['req_email'];
    $office = 'Municipal Planning and Development Office';

    $body = [
        'name' => $name,
        'email' => $email,
        'status' => 'Denied',
        'message' => $msg,
        'office' => $office
    ];

    $ch = curl_init('https://send-email.portalto.cloud/api/mpdo/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
    curl_setopt($ch, CURLOPT_POST, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($conn->query($sql) === TRUE) {
        header('location: ../?list&success');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}elseif (isset($_GET['release'])) {
    $id = $_GET['release'];

    $sql = "UPDATE t_applications SET req_status = 'Release' WHERE req_id = '$id'";

    $info = "SELECT *FROM t_applications WHERE req_id = '$id'";
    $info_result = $conn->query($info);
    $info_row = $info_result->fetch_assoc();

    $msg = 'We are pleased to inform you that your requested documents are now ready for release. You can claim your documents at our office during our regular business hours. If you have any questions or need further assistance, please do not hesitate to contact us.';

    $name = $info_row['req_lastName'] . ', ' . $info_row['req_firstName'];
    $email = $info_row['req_email'];
    $office = 'Municipal Planning and Development Office';

    $body = [
        'name' => $name,
        'email' => $email,
        'status' => 'Release',
        'message' => $msg,
        'office' => $office
    ];

    $ch = curl_init('https://send-email.portalto.cloud/api/mpdo/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
    curl_setopt($ch, CURLOPT_POST, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($conn->query($sql) === TRUE) {
        header('location: ../?list&success');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}