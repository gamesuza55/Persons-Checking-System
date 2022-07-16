<?php
require_once "functions.php";
if (isset($_SESSION['username'])) {
    header("location: admin/index.php");
}
?>
<!doctype html>
<html lang="en">

<head>

    <?php require_once "partials/title_meta.php"; ?>
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <?php require_once "partials/header_css.html"; ?>
</head>

<body>

    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <h4 class="text-info">Personal Checking System</h4>
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Login Administration</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal mt-3" action="#" method="POST">

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <!-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                    </div> -->
                                </div>
                            </div>

                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" name="submit-login" type="submit">เข้าสู่ระบบ <i class="ri-login-box-line"></i></button>
                                </div>
                            </div>
                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <a class="btn btn-danger w-100 waves-effect waves-light" href="index.php">กลับสู่หน้าหลัก <i class=" ri-arrow-go-back-line"></i></a>
                                </div>
                            </div>

                            <!-- <div class="form-group mb-0 row mt-2">
                                <div class="col-sm-7 mt-3">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                                <div class="col-sm-5 mt-3">
                                    <a href="auth-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                </div>
                            </div> -->
                        </form>
                    </div>
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->
    <?php require_once "partials/vendor_script.php"; ?>
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <?php

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $CheckUser = new DB_con();
    $users = $CheckUser->CheckUser($username, $password);

    ?>
</body>

</html>