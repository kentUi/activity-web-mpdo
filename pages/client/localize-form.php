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
                                    <input class="form-control" id="name" required name="   " type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Name of Applicant</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required name="inp_corporation" type="text"
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
                                    <select id="tx_region" required name="inp_region_corp" class="form-control"
                                        onchange="DISPLAY_PROVINCE(this.value)">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">Region</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select id="tx_province" required name="inp_province_corp" class="form-control"
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
                                    <select id="tx_citymun" required name="inp_citymun_corp" class="form-control"
                                        onchange="DISPLAY_BARANGAY(this.value)">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">City/Municipality</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-6">
                                    <select id="tx_brgy" required name="inp_brgy_corp" class="form-control">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                    <label for="name">Baranagay</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_projectype" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Project Type</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_projectlocation" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Project Location</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="inp_projectnature" required id="" class="form-control">
                                        <option value="">New Development</option>
                                        <option value="">Existing</option>
                                        <option value="">Others (Specific)</option>
                                    </select>
                                    <label for="name">Project Nature</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_projectnature_specific"
                                        type="number" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Please Specify (Optional)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="inp_projecttenure" required id="" class="form-control">
                                        <option value="">Permanent</option>
                                        <option value="">Temporary (Specify number of years)</option>
                                    </select>
                                    <label for="name">Project Tenure</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_projecttenure_specific"
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
                                    <input class="form-control" id="name" name="inp_overland_specific"
                                        type="number" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Please Specify (Optional)</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="inp_projectsite" required id="" class="form-control">
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
                                    <input class="form-control" id="name" name="inp_projectsite_specific"
                                        type="number" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Please Specify (Optional)</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required name="inp_projectarealot" type="number"
                                        placeholder="Enter Lot for Project Area..." data-sb-validations="required" />
                                    <label for="name">Lot for Project Area (Sq.m): </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required name="inp_projectareabldg" type="number"
                                        placeholder="Enter Bldg/Imporvements..." data-sb-validations="required" />
                                    <label for="name">Bldg/Imporvements for Project Area (Sq.m): </label>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_projectcost" type="number"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Project Cost/Capitalization</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row ">
                            <div class="col-md-12">
                                <p><b>Is the project applied for subject written notice(s) from the Board and/or
                                        Deputized Zoning Admistrator to the effect requiring for presentaion of
                                        Locational Clerance?</b> If YES, please answer:</p>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_a_hlurb" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">A. Name of HLURB Officer who issued the notice</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_b_order" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">B. Order/Request indicated in the Notice(s)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_c_datenotice" type="date"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">C. Date of Notice</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row ">
                            <div class="col-md-12">
                                <p><b>Is the project applied for, Subject of similar application(s) with other offices
                                        of the Board and/or DZA ?</b><br> If YES, please answer:</p>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_a_otherhlurb" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">A. Other HLURB Offices where similar application was
                                        filed:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_b_datefiled" type="date"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">B. Date Filed</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="inp_c_actiontaken" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Action Taken</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select name="inp_mode" required id="" class="form-control">
                                        <option value="Pick-up">Pick-up</option>
                                        <option value="by E-Mail, Addressed">by E-Mail, Addressed</option>
                                    </select>
                                    <label for="name">Prefer mode of release of Decision</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4>Requirements <strong>(Photo Copy only)</strong></h4>
                        Note: <i>You can upload multiple files here..</i>
                        <hr>
                        <label for="file-upload1" class="custom-file-upload">
                            <b>PROOF OF OWNERSHOP OVER THE LAND</b> to be used; <br>
                            Cerfication of Title or Tax Declaration in the name of the application or any of the
                            following documents together with owner`s Certification of Title or Tax Declation:
                            <ul>
                                <li>A. Deed of Sale in the name of the application</li>
                                <li>B. Deed of Donation</li>
                                <li>C. Contract of Lease</li>
                                <li>D. Authorization to use the land from the landowner</li>
                            </ul>
                        </label>
                        <input id="file-upload1" name="inp_uploadfile1" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            <b>VICINITY MAP</b> (or Location Plan) showing existing land uses with 100.00 meter radius
                            (for project of local significance) and one (1) kilometer radius (for project of national
                            significance) form the boundary of project side;
                        </label>
                        <input id="file-upload" name="inp_uploadfile2" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            <b>SITE DEVELOPMENT PLAN</b> <br> (or Lot Plan) showing lot area boundaries and dimensions of
                            proposed improvements within the project site;
                        </label>
                        <input id="file-upload" name="inp_uploadfile3" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            <b>FLOOR PLAN</b> of hte proposed/existing project;
                        </label>
                        <input id="file-upload" name="inp_uploadfile4" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            <b>CERIFICATE OF ZONING</b> <br> from the City/Municipality Planning and Development Office, as
                            to zone classification of the project area;
                        </label>
                        <input name="inp_uploadfile5" id="file-upload" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            <b>BILL OF MATERIAL/ESTIMATED OF THE PROJECT</b> <br> (cost of construction including
                            machineries/equipments if any) signed by engineer or achitech;
                        </label>
                        <input name="inp_uploadfile5" id="file-upload" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            <b>BARANGAY CONSTRUCTION CLEARANCE</b> (Concerned Barangay)
                        </label>
                        <input name="inp_uploadfile6" id="file-upload" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            <b>LINE & GRADE CLEARANCE</b> (Engineering Office)
                        </label>
                        <input name="inp_uploadfile7" id="file-upload" class="form-control mt-2" type="file" />
                        <hr>
                        <label for="file-upload" class="custom-file-upload">
                            <b>COPY OF BUILDING PERMIT</b> (to on-going and existing project and TPZ Monitored project)
                        </label>
                        <input name="inp_uploadfile8" id="file-upload" class="form-control mt-2" type="file" />
                        <hr>
                        <div class="form-inline">
                            <input type="checkbox" id="data-privacy" onclick="confirm()" class="checkbox" style="transform: scale(1.5);">
                            <label for="data-privacy">By submitting this form, you agree that the information provided
                                will be used for the sole purpose of <b>Application for Zoning Certificate</b>. Your data will be treated confidentially and will
                                not be shared with third parties without your explicit consent.</label>
                        </div>

                        <div class="form-inline mt-3 mb-4">
                            <label for="data-privacy"><small><i>We take data privacy seriously and implement security measures to safeguard your information. You have the right to access, modify, or delete your data upon request.</i></small></label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success btn-lg" disabled id="submitButton" type="submit">
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
</body>

</html>