<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-white rounded-4 py-5 px-4 px-md-5">
            <div class="text-center ">
                <h1 class="fw-bolder">Request Certificate</h1>
                <p class="lead fw-normal text-muted mb-0">Application for Zoning Certificate</p>
            </div>
            <hr>
            <div class="row gx-5 mt-4 justify-content-center">
                <div class="col-lg-8 col-xl-12">
                    <form method="POST" action="?s" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input required class="form-control" id="name" required readonly name="inp_firstName"
                                        type="text" placeholder="Enter your name..." data-sb-validations="required"
                                        value="<?= $_SESSION['fname'] ?>" />
                                    <label for="name">First Name</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A First Name is
                                        required.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input required class="form-control" id="name" required readonly name="inp_lastName"
                                        type="text" placeholder="Enter your name..." data-sb-validations="required"
                                        value="<?= $_SESSION['lname'] ?>" />
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
                                    <input required class="form-control" id="name" required name="inp_owner" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Name of Owner</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A Name of Owner is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input required class="form-control" id="name" required name="inp_taxdec" type="text"
                                        placeholder="Enter your Tax Declaration..." data-sb-validations="required" />
                                    <label for="name">Based on Tax Declaration or Lot Title</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A Based on Tax Declaration or Lot Title is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select required id="tx_region" required name="inp_region" class="form-control"
                                        onchange="DISPLAY_PROVINCE(this.value)">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">Region</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select required id="tx_province" required name="inp_province" class="form-control"
                                        onchange="DISPLAY_CITYMUN(this.value)">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">Province</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-6">
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select required id="tx_citymun" required name="inp_citymun" class="form-control"
                                        onchange="DISPLAY_BARANGAY(this.value)">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">City/Municipality</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select required id="tx_brgy" required name="inp_brgy" class="form-control">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">Baranagay</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input required class="form-control" id="name" name="inp_street" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
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
                                    <input required class="form-control" id="name" required name="inp_sqrmeter" type="number"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Total Area of Lot (in Square Meter)</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A Total Area of Lot
                                        (in Square Meter) is required.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select required name="inp_overland" required id="" class="form-control">
                                        <option value="Owner">Owner</option>
                                        <option value="Lessee">Lessee</option>
                                        <option value="Others (Specific)">Others (Specific)</option>
                                    </select>
                                    <label for="name">Right over Land</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select required name="inp_mode" required id="" class="form-control">
                                        <option value="Pick-up">Pick-up</option>
                                        <option value="by Mail, Addressed">by Mail, Addressed</option>
                                        <option value="by E-Mail, Addressed">by E-Mail, Addressed</option>
                                    </select>
                                    <label for="name">Mode of release of certification</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select required name="inp_ownertitle" id="" class="form-control">
                                        <option value="Owner">Owner</option>
                                        <option value="Authorized Representative">Authorized Representative</option>
                                    </select>
                                    <label for="name">To</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input required class="form-control" id="name" required name="inp_receiver" type="text"
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
                                    <input required class="form-control" id="email" required readonly name="inp_email"
                                        type="email" placeholder="name@example.com" data-sb-validations="required,email"
                                        value="<?= $_SESSION['emailID'] ?>" />
                                    <label for="email">Email address</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">An email is
                                        required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input required class="form-control" required name="inp_mobile" id="phone" type="tel"
                                        placeholder="(123) 456-7890" data-sb-validations="required" />
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
                        <label for="file-upload1" class="custom-file-upload">
                            Vicinity Map drawn to an appropriate scale showing the property in question, including
                            geographic coordinates (WGS 84) of the estimated center of the property.lot and indicating
                            appropriate landmarks/Approved lot skecth plan or V037 from DENR X Land Department.
                        </label>
                        <input required id="file-upload1" name="inp_uploadfile1" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            TCT (or any proof of ownership or right over the property) / Latest Tax Declaration form the
                            municipal Assesor`s Office.
                        </label>
                        <input required id="file-upload2" name="inp_uploadfile2" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            Latest Tax Clearance form the Municaplity Treasurer`s Ofiice.
                        </label>
                        <input required id="file-upload3" name="inp_uploadfile3" class="form-control mt-2" type="file" />
                        <hr>
                        <div class="form-inline">
                            <input required type="checkbox" id="data-privacy" onclick="confirm()" class="checkbox" style="transform: scale(1.5);">
                            <label for="data-privacy">By submitting this form, you agree that the information provided
                                will be used for the sole purpose of <b>Application for Zoning Certificate</b>. Your data will be treated confidentially and will
                                not be shared with third parties without your explicit consent.</label>
                        </div>

                        <div class="form-inline mt-3 mb-4">
                            <label for="data-privacy"><small><i>We take data privacy seriously and implement security measures to safeguard your information. You have the right to access, modify, or delete your data upon request.</i></small></label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success btn-lg" name="btnzone" disabled id="submitButton" type="submit">
                                Submit Application
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .form-inline {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .checkbox {
        margin-right: 20px;
        /* Adjust as needed for spacing */
    }

    .label-text {
        font-size: 14px;
        /* Additional styling can be applied here, such as color or line height */
    }
</style>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="./assets/ph-address.js"></script>
<script>
    function confirm(){
        var agree = document.getElementById('data-privacy');
        var btn = document.getElementById('submitButton');

        if(agree.checked){
            btn.disabled = false;
        }else{
            btn.disabled = true;
        }
    }
</script>
</body>

</html>