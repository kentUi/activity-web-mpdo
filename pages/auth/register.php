<section class="py-5">
    <div class="container px-5">
        <div class="bg-white rounded-4 py-5 px-4 px-md-5">
            <div class="text-center ">
                <h1 class="fw-bolder">Sign-Up</h1>
                <p class="lead fw-normal text-muted mb-0">Account registration to request a clerance</p>
            </div>
            <hr>
            <div class="row gx-5 mt-4 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <?php
                    if (isset($_GET['exist'])) {
                        ?>
                        <div class="alert alert-danger">
                            <b>Username Exist. </b>
                            The Email is already exist.
                        </div>
                        <?php
                    }
                    ?>
                    <form method="POST" action="?auth" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" required name="inp_fname" type="text"
                                        placeholder="Enter your first name..." data-sb-validations="required" />
                                    <label for="name">Enter First Name :</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" required name="inp_lname" type="text"
                                        placeholder="Enter your Last name..." data-sb-validations="required" />
                                    <label for="name">Enter Last Name :</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required name="inp_email" type="email"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Enter Username :</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A First Name is
                                        required.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" required name="inp_password" type="password"
                                        placeholder="Enter your name..." />
                                    <label for="name">Enter Password :</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A Last Name is
                                        required.
                                    </div>
                                </div>
                            </div>
                        </div>
                        You Already have an account ?
                        <a href="?login" style="text-decoration: none">Sign-in here</a>
                        <hr>
                        <!-- Submit Button-->
                        <div class="d-grid">
                            <button class="btn btn-success btn-lg" id="submitButton" name="register" type="submit">
                                <span class="bi bi-save"></span>&nbsp;
                                Sign-up
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>