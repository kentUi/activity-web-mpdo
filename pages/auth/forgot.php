<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <?php
        if (isset($_GET['reset'])) {

            if (isset($_GET['forge'])) {
                if (hash('SHA256', $_GET['forge']) == $_GET['token']) {


                    ?>
                    <div class="bg-white rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center ">
                            <h1 class="fw-bolder">New Password</h1>
                            <p class="lead fw-normal text-muted mb-0">We dectect that your password is default.</p>
                        </div>
                        <hr>
                        <div class="row gx-5 mt-4 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <?php
                                if (isset($_GET['invalid'])) {
                                    ?>
                                    <div class="alert alert-danger">
                                        <b>Password is not match.</b>
                                        Please try again. Thank you.
                                    </div>
                                    <?php
                                }
                                ?>
                                <form method="POST" action="?auth" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input type="hidden" name="inp_xemail" value="<?= $_SESSION['emailID'] ?>">
                                                <input class="form-control" id="name" required name="inp_password1" type="password"
                                                    placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">New Password :</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">A First Name is
                                                    required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" required name="inp_password2" type="password"
                                                    placeholder="Enter your name..." />
                                                <label for="name">Confirm Password :</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">A Last Name is
                                                    required.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid">
                                        <button class="btn btn-success btn-lg" id="submitButton" type="submit"
                                            name="reset-password">
                                            <span class="bi bi-save"></span>
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <script>window.location.href = '?forgot'</script>
                    <?php
                }
            }
        } else {
            ?>
            <div class="bg-white rounded-4 py-5 px-4 px-md-5">
                <div class="text-center ">
                    <h1 class="fw-bolder">Forgot Password</h1>
                    <p class="lead fw-normal text-muted mb-0">Request to Reset Password</p>
                </div>
                <hr>
                <div class="row gx-5 mt-4 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <?php
                        if (isset($_GET['invalid'])) {
                            ?>
                            <div class="alert alert-danger">
                                <b>Invalid Username/Password. </b>
                                You enter wrong credentials. Please try again. Thank you.
                            </div>
                            <?php
                        }
                        ?>

                        <?php
                        if (isset($_GET['ss'])) {
                            ?>
                            <div class="alert alert-success">
                                <b>Link has been sent.</b>
                                Please follow the link. Thank you.
                            </div>
                            <?php
                        }
                        ?>
                        <form method="POST" action="?auth" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" required name="inp_email" type="email"
                                            placeholder="Enter your name..." data-sb-validations="required" value="-" />
                                        <label for="name">Enter Username or Email Address :</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">A First Name is
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
                                <button class="btn btn-success btn-lg" id="submitButton" name="forgot" type="submit">
                                    <span class="bi bi-save"></span>
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>
</body>

</html>