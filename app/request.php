<?php
require('./config/database.php');

if (isset($_POST['btnzone'])) {
    $firstName = $_POST['inp_firstName'];
    $lastName = $_POST['inp_lastName'];
    $owner = $_POST['inp_owner'];
    $taxdec = $_POST['inp_taxdec'];
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


    $uploadDir = "./uploads/zoning/"; // Directory to store uploaded files

    $uploadedFile1 = $_FILES['inp_uploadfile1']['name'];
    $targetFile1 = $uploadDir . uniqid() . basename($uploadedFile1);

    $uploadedFile2 = $_FILES['inp_uploadfile2']['name'];
    $targetFile2 = $uploadDir . uniqid() . basename($uploadedFile2);

    $uploadedFile3 = $_FILES['inp_uploadfile3']['name'];
    $targetFile3 = $uploadDir . uniqid() . basename($uploadedFile3);


    if (move_uploaded_file($_FILES['inp_uploadfile1']['tmp_name'], $targetFile1)) {
    }
    if (move_uploaded_file($_FILES['inp_uploadfile2']['tmp_name'], $targetFile2)) {
    }
    if (move_uploaded_file($_FILES['inp_uploadfile3']['tmp_name'], $targetFile3)) {
    }

    $sql = "INSERT INTO t_applications ( req_firstName, req_lastName, req_owner, req_ownertaxdec, req_region, req_province, req_citymun, req_brgy, req_street, req_sqrmeter, req_overland, req_mode, req_ownertitle, req_receiver, req_email, req_mobile, req_ref_file_1, req_ref_file_2, req_ref_file_3, req_status, req_date, req_accid) VALUES ( '$firstName', '$lastName', '$owner', '$taxdec', '$region', '$province', '$cityMunicipality', '$barangay', '$street', '$squareMeter', '$overlandDescription', '$ownershipMode', '$ownerTitle', '$receiver', '$email', '$mobile', '$targetFile1', '$targetFile2', '$targetFile3', 'Pending', '" . date('Y-m-d') . "', '" . $_SESSION['id'] . "')";
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
                            class="text-danger">
                            <?= $email ?>
                        </b> or <b class="text-danger">
                            <?= $mobile ?>
                        </b>. Stay tuned
                        for further updates!
                    </p>
                </div>
            </div>
        </div>
    </section>

<?php } elseif (isset($_POST['btnlocalize'])) {

    $local_id = uniqid();

    $inp_applicant = $_POST['inp_applicant'];
    $inp_corporation = $_POST['inp_corporation'];
    $inp_region = $_POST['inp_region'];
    $inp_province = $_POST['inp_province'];
    $inp_citymun = $_POST['inp_citymun'];
    $inp_brgy = $_POST['inp_brgy'];
    $inp_region_corp = $_POST['inp_region_corp'];
    $inp_province_corp = $_POST['inp_province_corp'];
    $inp_citymun_corp = $_POST['inp_citymun_corp'];
    $inp_brgy_corp = $_POST['inp_brgy_corp'];
    $inp_projectype = $_POST['inp_projectype'];
    $inp_projectlocation = $_POST['inp_projectlocation'];
    $inp_projectnature = $_POST['inp_projectnature'];
    $inp_projectnature_specific = $_POST['inp_projectnature_specific'];
    $inp_projecttenure = $_POST['inp_projecttenure'];
    $inp_projecttenure_specific = $_POST['inp_projecttenure_specific'];
    $inp_overland = $_POST['inp_overland'];
    $inp_overland_specific = $_POST['inp_overland_specific'];
    $inp_projectsite = $_POST['inp_projectsite'];
    $inp_projectsite_specific = $_POST['inp_projectsite_specific'];
    $inp_projectarealot = $_POST['inp_projectarealot'];
    $inp_projectareabldg = $_POST['inp_projectareabldg'];
    $inp_projectcost = $_POST['inp_projectcost'];

    $sql_info = "INSERT INTO t_localize_info (local_id,local_applicant, local_corporation, local_region, local_province, local_citymun, local_brgy, local_region_corp, local_province_corp, local_citymun_corp, local_brgy_corp, local_projectype, local_projectlocation, local_projectnature, local_projectnature_specific, local_projecttenure, local_projecttenure_specific, local_overland, local_overland_specific, local_projectsite, local_projectsite_specific, local_projectarealot, local_projectareabldg, local_projectcost,local_status,local_date,local_accid)
    VALUES ('$local_id','$inp_applicant', '$inp_corporation', '$inp_region', '$inp_province', '$inp_citymun', '$inp_brgy', '$inp_region_corp', '$inp_province_corp', '$inp_citymun_corp', '$inp_brgy_corp', '$inp_projectype', '$inp_projectlocation', '$inp_projectnature', '$inp_projectnature_specific', '$inp_projecttenure', '$inp_projecttenure_specific', '$inp_overland', '$inp_overland_specific', '$inp_projectsite', '$inp_projectsite_specific', '$inp_projectarealot', '$inp_projectareabldg', '$inp_projectcost','Pending', '" . date('Y-m-d') . "', '" . $_SESSION['id'] . "')";

    $inp_a_hlurb = $_POST['inp_a_hlurb'];
    $inp_b_order = $_POST['inp_b_order'];
    $inp_c_datenotice = $_POST['inp_c_datenotice'];
    $inp_a_otherhlurb = $_POST['inp_a_otherhlurb'];
    $inp_b_datefiled = $_POST['inp_b_datefiled'];
    $inp_c_actiontaken = $_POST['inp_c_actiontaken'];
    $inp_mode = $_POST['inp_mode'];

    $sql_other = "INSERT INTO t_localize_other (local_id,local_a_hlurb, local_b_order, local_c_datenotice, local_a_otherhlurb, local_b_datefiled, local_c_actiontaken, local_mode)
    VALUES ('$local_id','$inp_a_hlurb', '$inp_b_order', '$inp_c_datenotice', '$inp_a_otherhlurb', '$inp_b_datefiled', '$inp_c_actiontaken', '$inp_mode')";

    $uploadDir = "./uploads/localize/"; // Directory to store uploaded files

    $req = [
        'PROOF OF OWNERSHOP OVER THE LAND',
        'VICINITY MAP',
        'SITE DEVELOPMENT PLAN',
        'FLOOR PLAN',
        'CERIFICATE OF ZONING',
        'BILL OF MATERIAL/ESTIMATED OF THE PROJECT',
        'BARANGAY CONSTRUCTION CLEARANCE',
        'LINE & GRADE CLEARANCE',
        'COPY OF BUILDING PERMIT'
    ];

    for ($i = 1; $i <= 9; $i++) {
        $fileInputName = "inp_uploadfile$i";
        
        $type = $req[$i - 1];
        
        if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
            $targetFile = $uploadDir . uniqid() . basename($_FILES[$fileInputName]['name']);
    
            if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)) {
                $sql = "INSERT INTO t_localize_req(local_id,local_path,local_type) VALUES('$local_id', '$targetFile','$type')";
                $conn->query($sql);
            } else {
                echo "Error uploading file $i.<br>";
            }
        }
    }

    $conn->query($sql_info);
    $conn->query($sql_other);

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
                        is greatly appreciated. We will now proceed with the necessary steps. We will contact you. Stay tuned
                        for further updates!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php

}
?>
    