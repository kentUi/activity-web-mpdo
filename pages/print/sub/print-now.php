<style>
    body{
        font-family: 'Arial';
    }
</style>
    
<?php
if(isset($_GET['token'])){
    $load = 'window.print()';
    $logo = '../../../assets/lgu.png';
    require('../../../config/database.php');
    $search = $_GET['token'];
    $style_header = "font-size: 14px; font-family: 'Arial';";
    $style_logo = "position: absolute; left: 100px; margin-top: -10px; height: 80px;";
    $style_body = "padding-left: 50px;padding-right: 50px; padding-top: 10px";
}else{
    $load = '';
    $logo = './assets/lgu.png';
    require('./config/database.php');
    $search = $_GET['id'];
    $style_header = "font-size: 20px; font-family: 'Arial';";
    $style_logo = "position: absolute; left: 110px; margin-top: 8px; height: 120px;";
    $style_body = "padding-left: 50px;padding-right: 50px; padding-top: 50px";
}


$sql = "SELECT *FROM t_applications INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode WHERE req_id = '$search'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<body >
<style>
    hr {
        border-color: #000 !important;
        background-color: #000;
        margin-top: 1px;
        margin-bottom: 1px;
    }
</style>
<center>
    <img src="<?= $logo ?>" class="img"style="<?= $style_logo ?>">
    <p style="<?= $style_header ?>">
        REPUBLIC OF THE PHILIPPINES <br>
        Province of Misamis Oriental <br>
        Municipality of Tagoloan <br>
        <b>Office of the Municipal Planning and Development Office</b>
    </p>
    <h4><b><u>APPLICATION FORM FOR ZONING CERTIFICATION</u></b></h4>
</center>
<div style="<?= $style_body ?>">
   
    <b>1. Name of Applicant</b><br>
    <?= $row['req_lastName'] ?>,
    <?= $row['req_firstName'] ?>
    <hr>
    <b>2. Address of Applicant</b><br>
    <?= $row["citymunDesc"] . ', ' . $row["brgyDesc"] ?>
    <hr>

    <b>3. Name of Owner (Based on Tax Declaration or Lot Title)</b><br>
    <?= $row["req_owner"] ?>
    <hr>
    
    <b>4. Total Area of Lot (in Square Meter)</b><br>
    <?= $row["req_sqrmeter"] ?> SQM
    <hr>

    <b>5. Right over Land</b><br>
    <?= $row["req_overland"] ?>
    <hr>
    
    <b>6. Mode of release of certification</b><br>
    <?= $row["req_mode"] ?>
    <hr>
    
    <b>7. Preferred mode of release of certification</b><br>
    <?= $row["req_mode"] ?>
    <hr>
    
    <div style="padding-left: 50px">
        <b>To</b><br>
        <?= $row["req_receiver"] ?>
        <hr>
    </div>
    <br>

    <b>8. Signature of Applicant</b><br>
    
    <hr>
    
    <b>9. Signature of Owner</b><br><br>
    <hr>
    <b>10. Requirements:</b><br>
    <div style="padding-left: 50px">
        <b>[ ️✔ ]</b>
        <div style="padding-left: 40px; position: relative; top: -22px; text-align: justify;">
            Vicinity Map drawn to an appropriate scale showing the property in question, including
            geographic coordinates (WGS 84) of the estimated center of the property.lot and indicating
            appropriate landmarks/Approved lot skecth plan or V037 from DENR X Land Department.
        </div>
        <b>[ ️✔ ]</b>
        <div style="padding-left: 40px; position: relative; top: -22px;text-align: justify;">
            TCT (or any proof of ownership or right over the property) / Latest Tax Declaration form the
            municipal Assesor`s Office.
        </div>
        <b>[ ️✔ ]</b>
        <div style="padding-left: 40px; position: relative; top: -22px;">
            Latest Tax Clearance form the Municaplity Treasurer`s Ofiice.
        </div>
    </div>
    <b style="font-family: 'Arial'; ">Republic of the Philippines) <br>
        _________________________)</b> &emsp; S.S
    <br>
    <p style="font-family: 'Arial'; text-align: justify;">

        <b>
            SUBSCRIBED AND SWORM TO before me this _____________ day of ________________ 20 _______ in the municipalty
            of
            ________________________________, province of _________________________ affiant of exhibited to me his/her
            Residence Certificate No. _____________ issued at ___________________ on ___________________.
            <br><br>
        </b>

        Doc. No. ____________ <br>
        Page No. ____________ <br>
        <b style="float: right">NOTARY PUBLIC</b>
        Book No. ____________ <br>
        Series No. ___________ 
    </p>

   
</div>

</body>