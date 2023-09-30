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
$tempFilePath = $_FILES['inp_uploadfile1']['tmp_name'];


$uploadDir = "./uploads/"; // Directory to store uploaded files
$uploadedFile = $_FILES['inp_uploadfile1']['name'];
$targetFile = $uploadDir . basename($uploadedFile);

$sql = "INSERT INTO t_applications ( req_firstName, req_lastName, req_owner, req_region, req_province, req_citymun, req_brgy, req_street, req_sqrmeter, req_overland, req_mode, req_ownertitle, req_receiver, req_email, req_mobile, req_filereference ) VALUES ( '$firstName', '$lastName', '$owner', '$region', '$province', '$cityMunicipality', '$barangay', '$street', '$squareMeter', '$overlandDescription', '$ownershipMode', '$ownerTitle', '$receiver', '$email', '$mobile', '$targetFile' )";


if ($conn->query($sql) === TRUE) {
    //echo "<br> Data saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// if (move_uploaded_file($_FILES['inp_uploadfile1']['tmp_name'], $targetFile)) {
//     echo "File uploaded successfully!<br>";

//     $sql = "INSERT INTO your_table_name (first_name, last_name, owner, region, province, city_municipality, barangay, street, square_meter, overland_description, ownership_mode, owner_title, receiver, email, mobile, file_reference) VALUES ('$firstName', '$lastName', '$owner', '$region', '$province', '$cityMunicipality', '$barangay', '$street', '$squareMeter', '$overlandDescription', '$ownershipMode', '$ownerTitle', '$receiver', '$email', '$mobile', '$targetFile')";

//     if ($conn->query($sql) === TRUE) {
//         echo "<br> Data saved successfully!";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// } else {
//     echo "File upload failed.";
// }

// Close the database connection
$conn->close();
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