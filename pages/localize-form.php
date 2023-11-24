<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-white rounded-4 py-5 px-4 px-md-5">
            <div class="text-center ">
                <h1 class="fw-bolder">Request Certificate</h1>
                <p class="lead fw-normal text-muted mb-0">Application for Locational/Zoning Certificate</p>
            </div>
            <hr>
            <div class="row gx-5 mt-4 justify-content-center">
                <div class="col-lg-8 col-xl-12">
                    <form method="POST" action="?s" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required name="inp_firstName" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Name of Applicant</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required name="inp_lastName" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Name of Corporation</label>
                                </div>
                            </div>
                        </div>
                        <b>Address of Applicant</b>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select id="tx_region" required name="inp_region" class="form-control"
                                        onchange="DISPLAY_PROVINCE(this.value)">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">Region</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select id="tx_province" required name="inp_province" class="form-control"
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
                                    <select id="tx_citymun" required name="inp_citymun" class="form-control"
                                        onchange="DISPLAY_BARANGAY(this.value)">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">City/Municipality</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select id="tx_brgy" required name="inp_brgy" class="form-control">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">Baranagay</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <b class="mt-2">Address of Corporation</b>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select id="tx_region" required name="inp_region" class="form-control"
                                        onchange="DISPLAY_PROVINCE(this.value)">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">Region</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select id="tx_province" required name="inp_province" class="form-control"
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
                                    <select id="tx_citymun" required name="inp_citymun" class="form-control"
                                        onchange="DISPLAY_BARANGAY(this.value)">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">City/Municipality</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select id="tx_brgy" required name="inp_brgy" class="form-control">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">Baranagay</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_street" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Project Type</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_street" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Project Location</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="inp_overland" required id="" class="form-control">
                                        <option value="">Permanent</option>
                                        <option value="">Temporary (Specify number of years)</option>
                                    </select>
                                    <label for="name">Project Tenure</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required readonly name="inp_sqrmeter"
                                        type="number" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Please Specify (Optional)</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="inp_overland" required id="" class="form-control">
                                        <option value="">New Development</option>
                                        <option value="">Existing</option>
                                        <option value="">Others (Specific)</option>
                                    </select>
                                    <label for="name">Project Nature</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required readonly name="inp_sqrmeter"
                                        type="number" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Please Specify (Optional)</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="inp_overland" required id="" class="form-control">
                                        <option value="">Owner</option>
                                        <option value="">Lessee</option>
                                        <option value="">Others (Specific)</option>
                                    </select>
                                    <label for="name">Right over Land</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required readonly name="inp_sqrmeter"
                                        type="number" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Please Specify (Optional)</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="inp_overland" required id="" class="form-control">
                                        <option value="">Residential</option>
                                        <option value="">Institution</option>
                                        <option value="">Commercial</option>
                                        <option value="">Industrial</option>
                                        <option value="">cant/idle</option>
                                        <option value="">Agricultural (Specify kind of crop)</option>
                                        <option value="">Others (Specific)</option>
                                    </select>
                                    <label for="name">Existing Land Uses of Project Site</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required readonly name="inp_sqrmeter"
                                        type="number" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Please Specify (Optional)</label>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_street" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Project Cost/Capitalization</label>
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
                        <input id="file-upload1" name="inp_uploadfile1" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            TCT (or any proof of ownership or right over the property) / Latest Tax Declaration form the
                            municipal Assesor`s Office.
                        </label>
                        <input id="file-upload" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            Latest Tax Clearance form the Municaplity Treasurer`s Ofiice.
                        </label>
                        <input id="file-upload" class="form-control mt-2" type="file" />
                        <hr>
                        <!-- Submit Button-->
                        <div class="d-grid">
                            <button class="btn btn-success btn-lg" id="submitButton" type="submit">
                                Submit Application
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="./assets/ph-address.js"></script>
</body>

</html>