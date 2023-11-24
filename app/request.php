<?php
require('./config/database.php');

$firstName = $_POST['inp_firstName'];
$lastName = $_POST['inp_lastName'];
$owner = $_POST['inp_owner'];
$region = $_POST['inp_region'];
$province = $_POST['inp_province'];
$cityMunicipality = $_POST['inp_citymun'];
$barangay = $_POST['inp_brgy'];
$street = $_POST['inp_street'];
$squareMeter = $_POST['inp_sqrmeter'];
$overlandDescription = $_POST['inp_overland'];
$ownershipMode = $_POST['inp_mode'];
$ownerTitle = $_POST['inp_ownertitle'];
$receiver = $_POST['inp_receiver'];
$email = $_POST['inp_email'];
$mobile = $_POST['inp_mobile'];
$tempFilePath1 = $_FILES['inp_uploadfile1']['tmp_name'];
$tempFilePath2 = $_FILES['inp_uploadfile2']['tmp_name'];
$tempFilePath3 = $_FILES['inp_uploadfile3']['tmp_name'];


$uploadDir = "./uploads/"; // Directory to store uploaded files

$uploadedFile1 = $_FILES['inp_uploadfile1']['name'];
$targetFile1 = $uploadDir . basename($uploadedFile1);

$uploadedFile2 = $_FILES['inp_uploadfile2']['name'];
$targetFile2 = $uploadDir . basename($uploadedFile2);

$uploadedFile3 = $_FILES['inp_uploadfile3']['name'];
$targetFile3 = $uploadDir . basename($uploadedFile3);


if (move_uploaded_file($_FILES['inp_uploadfile1']['tmp_name'], $targetFile1)) {}
if (move_uploaded_file($_FILES['inp_uploadfile2']['tmp_name'], $targetFile2)) {}
if (move_uploaded_file($_FILES['inp_uploadfile3']['tmp_name'], $targetFile3)) {}

$sql = "INSERT INTO t_applications ( req_firstName, req_lastName, req_owner, req_region, req_province, req_citymun, req_brgy, req_street, req_sqrmeter, req_overland, req_mode, req_ownertitle, req_receiver, req_email, req_mobile, req_ref_file_1, req_ref_file_2, req_ref_file_3, req_status, req_date, req_accid) VALUES ( '$firstName', '$lastName', '$owner', '$region', '$province', '$cityMunicipality', '$barangay', '$street', '$squareMeter', '$overlandDescription', '$ownershipMode', '$ownerTitle', '$receiver', '$email', '$mobile', '$targetFile1', '$targetFile2', '$targetFile3', 'Pending', '".date('Y-m-d')."', '".$_SESSION['id']."')";
if ($conn->query($sql) === TRUE) {
    //echo "<br> Data saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

$msg = 'This is to inform you that your request has been received and is currently being processed. We will notify you once your request has been approved and completed.';

$name = $_POST['inp_lastName'] . ', ' . $_POST['inp_firstName'];
$office = 'Municipal Planning and Development Office';

$body = [
    'name' => $name,
    'email' => $email,
    'status' => 'Pending',
    'message' => $msg,
    'office' => $office
];

$ch = curl_init('https://send-email.portalto.cloud/api/mpdo/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
curl_setopt($ch, CURLOPT_POST, 1);
$response = curl_exec($ch);
curl_close($ch);

?>

<section class="py-5">
    <div class="container px-5">
        <div class="bg-white rounded-4 py-5 px-4 px-md-5">
            <div class="text-center">
                <img src="./assets/double-check.png" height="150" alt="">
                <h1 class="fw-bolder text-success mt-2">Request Submitted!</h1>
                <p class="lead fw-normal text-dark mb-0">
                    Your request was successful. Thank you for following all the guidelines accurately. Your cooperation
                    is greatly appreciated. We will now proceed with the necessary steps. We will contact you via <b
                        class="text-danger"><?= $email ?></b> or <b class="text-danger"><?= $mobile ?></b>. Stay tuned
                    for further updates!
                </p>
            </div>
        </div>
    </div>
</section>