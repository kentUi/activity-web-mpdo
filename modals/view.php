<?php
require('../config/database.php');

$id = $_POST['id'];
$sql = "SELECT * FROM t_applications INNER JOIN ph_region ON req_region = regCode INNER JOIN ph_province ON req_province = provCode INNER JOIN ph_citymun ON req_citymun = citymunCode INNER JOIN ph_brgy ON req_brgy = brgyCode WHERE req_id = '$id'"; 

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No results found.";
}

$conn->close();
?>

<style>
    .form-control {
        border: 1px solid #e1e1e1;
        color: red;
    }
</style>
<script>
    var formControlInputs = document.querySelectorAll('input.form-control');

    // Loop through the input elements and set them as readonly
    for (var i = 0; i < formControlInputs.length; i++) {
        formControlInputs[i].readOnly = true;
    }
</script>

<form method="POST" action="?s" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input value="<?= $row['req_firstName'] ?>" class="form-control" id="name" required name="inp_firstName" type="text"
                    placeholder="Enter your name..." data-sb-validations="required" />
                <label for="name">First Name</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A First Name is
                    required.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input value="<?= $row['req_lastName'] ?>" class="form-control" id="name" required name="inp_lastName" type="text"
                    placeholder="Enter your name..." data-sb-validations="required" />
                <label for="name">Last Name</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A Last Name is
                    required.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-floating mb-3">
                <input value="<?= $row['req_owner'] ?>" class="form-control" id="name" required name="inp_owner" type="text"
                    placeholder="Enter your name..." data-sb-validations="required" />
                <label for="name">Name of Owner (Based on Tax Declaration or Lot Title)</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A Name of Owner
                    (Based on Tax Declaration or Lot Title) is required.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-6">
                <select id="tx_region" required name="inp_region" class="form-control"
                    onchange="DISPLAY_PROVINCE(this.value)">
                    <option value="" selected><?= $row['regDesc'] ?></option>
                    <option value="" disabled>-</option>
                </select>
                <label for="name">Region</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-6">
                <select id="tx_province" required name="inp_province" class="form-control"
                    onchange="DISPLAY_CITYMUN(this.value)">
                    <option value="" selected><?= $row['provDesc'] ?></option>
                    <option value="" disabled>-</option>
                </select>
                <label for="name">Province</label>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-6">
        <div class="col-md-6">
            <div class="form-floating mb-6">
                <select id="tx_citymun" required name="inp_citymun" class="form-control"
                    onchange="DISPLAY_BARANGAY(this.value)">
                    <option value="" selected><?= $row['citymunDesc'] ?></option>
                    <option value="" disabled>-</option>
                </select>
                <label for="name">City/Municipality</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-6">
                <select id="tx_brgy" required name="inp_brgy" class="form-control">
                    <option value="" selected><?= $row['brgyDesc'] ?></option>
                    <option value="" disabled>-</option>
                </select>
                <label for="name">Baranagay</label>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="form-floating mb-3">
                <input value="<?= $row['req_street'] ?>" class="form-control" id="name" name="inp_street" type="text" placeholder="Enter your name..."
                    data-sb-validations="required" />
                <label for="name">Street, Subd., Block, House #</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A Street, Subd.,
                    Block, House # is required.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input value="<?= $row['req_sqrmeter'] ?>" class="form-control" id="name" required name="inp_sqrmeter" type="number"
                    placeholder="Enter your name..." data-sb-validations="required" />
                <label for="name">Total Area of Lot (in Square Meter)</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A Total Area of Lot
                    (in Square Meter) is required.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <select name="inp_overland" required id="" class="form-control">
                    <option value="" selected><?= $row['req_overland'] ?></option>
                    <option value="" disabled>-----</option>
                    <option value="">Owner</option>
                    <option value="">Lessee</option>
                    <option value="">Others (Specific)</option>
                </select>
                <label for="name">Right over Land</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <select name="inp_mode" required id="" class="form-control">
                    <option value="" selected><?= $row['req_mode'] ?></option>
                    <option value="" disabled>-----</option>
                    <option value="">Pick-up</option>
                    <option value="">by Mail, Addressed</option>
                    <option value="">by E-Mail, Addressed</option>
                </select>
                <label for="name">Mode of release of certification</label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-floating mb-3">
                <select name="inp_ownertitle" id="" class="form-control">
                    <option value="" selected><?= $row['req_ownertitle'] ?></option>
                    <option value="" disabled>-----</option>
                    <option value="">Owner</option>
                    <option value="">Authorized Representative</option>
                </select>
                <label for="name">To</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input value="<?= $row['req_receiver'] ?>" class="form-control" id="name" required name="inp_receiver" type="text"
                    placeholder="Enter your name..." data-sb-validations="required" />
                <label for="name">Receiver Name</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A Receiver Name is
                    required.
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input class="form-control" id="email" required name="inp_email" type="email"
                value="<?= $row['req_email'] ?>" />
                <label for="email">Email address</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">An email is
                    required.</div>
                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input class="form-control" required name="inp_mobile" id="phone" type="tel"
                value="<?= $row['req_mobile'] ?>"/>
                <label for="phone">Phone number</label>
                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
                    required.
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h4>Requirements <strong>(Photo Copy only)</strong></h4>
    <hr>
        <div class="d-grid">
        <a href="#" class="btn btn-md btn-block btn-round btn-info">Vicinity Map drawn to an appropriate scale showing the property in question, including geographic coordinates (WGS 84) of the estimated center of the property.lot and indicating appropriate landmarks/Approved lot skecth plan or V037 from DENR X Land Department.</a>
        </div>
    <hr>
        <div class="d-grid">
        <a href="#" class="btn btn-md btn-block btn-round btn-info">TCT (or any proof of ownership or right over the property) / Latest Tax Declaration form the
        municipal Assesor`s Office.</a>
        </div>
    <hr>
        <div class="d-grid">
        <a href="#" class="btn btn-md btn-block btn-round btn-info"> Latest Tax Clearance form the Municaplity Treasurer`s Ofiice.</a>
        </div>
</form>