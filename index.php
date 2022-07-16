<?php

require_once "functions.php";
$trainCount = new DB_con();
$train = $trainCount->trainCount();
$plane = $trainCount->planeCount();
$car = $trainCount->carCount();
$boat = $trainCount->boatCount();
?>

<!doctype html>
<html lang="en">

<head>

    <?php require_once "partials/title_meta.php"; ?>
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- dropzone -->
    <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <?php require_once "partials/header_css.html"; ?>
</head>

<body data-topbar="dark" data-layout="horizontal" data-layout-size="boxed">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-12">
                            <div class="row">
                                <div class="col-xl-12 col-md-6">
                                    <div class="card border border-primary">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="font-size-14 mb-2">จำนวนผู้เข้าเมืองสงขลา (รถไฟ)</p>
                                                    <h4 class="mb-2">
                                                        <?= $train['type_travel'] == 1 ? $train['trainCount'] : "0"; ?> คน
                                                    </h4>
                                                    <p class="text-muted mb-0">.</p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-primary rounded-3">
                                                        <i class="ri-train-fill font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end cardbody -->
                                    </div><!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-6">
                                    <div class="card  border border-primary">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="font-size-14 mb-2">จำนวนผู้เข้าเมืองสงขลา (เครื่องบิน)</p>
                                                    <h4 class="mb-2">
                                                        <?= $plane['type_travel'] == 2 ? $plane['planeCount'] : "0"; ?> คน
                                                    </h4>
                                                    <p class="text-muted mb-0">.</p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-primary rounded-3">
                                                        <i class="ri-plane-line font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end cardbody -->
                                    </div><!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-6">
                                    <div class="card  border border-primary">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="font-size-14 mb-2">จำนวนผู้เข้าเมืองสงขลา (รถยนต์)</p>
                                                    <h4 class="mb-2">
                                                        <?= $car['type_travel'] == 3 ? $car['carCount'] : "0"; ?> คน
                                                    </h4>
                                                    <p class="text-muted mb-0">.</p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-primary rounded-3">
                                                        <i class="ri-car-fill font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end cardbody -->
                                    </div><!-- end card -->
                                </div>
                                <div class="col-xl-12 col-md-6">
                                    <div class="card  border border-primary">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="font-size-14 mb-2">จำนวนผู้เข้าเมืองสงขลา (ทางเรือ)</p>
                                                    <h4 class="mb-2">
                                                        <?= $boat['type_travel'] == 4 ? $boat['boatCount'] : "0"; ?> คน
                                                    </h4>
                                                    <p class="text-muted mb-0">.</p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-primary rounded-3">
                                                        <i class=" ri-ship-2-line font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end cardbody -->
                                    </div><!-- end card -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-md-12">
                            <div class="col-xl-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h4 class="fw-bold">ระบบตรวจสอบบุคคลเดินทางเข้าจังหวัดสงขลา</h4>
                                                <p class="card-title-desc" style="margin-bottom:0px;">กรุณากรอกข้อมูลให้ครบถ้วน</p>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <a href="auth-login.php" data-bs-toggle="tooltip" data-bs-placement="left" title="เข้าสู่ระบบ administration"><i class="ri-user-3-line font-size-24"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <hr>
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="custom-validation" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label>บัตรประจำตัวประชาชน <small>(Citizen ID/Passport)</small></label>
                                                    <input type="text" name="citizen_id" class="form-control" maxlength="13" data-parsley-type="number" data-parsley-minlength="13" data-parsley-error-message="กรุณากรอกเลขบัตรประชาชน 13 ตัว" required placeholder="ตัวอย่าง:x-xxxx-xxxxx-xx-x">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>ชื่อ</label>
                                                    <input type="text" name="firstname" class="form-control" data-parsley-error-message="กรุณาใส่ชื่อ" required placeholder="ตัวอย่าง:สมหมาย" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>นามสกุล</label>
                                                    <input type="text" name="lastname" class="form-control" data-parsley-error-message="กรุณาใส่นามสกุล" required placeholder="ตัวอย่าง:รุ่งเรือง" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>เบอร์โทรศัพท์</label>
                                                    <input type="text" name="phone_number" class="form-control" maxlength="10" data-parsley-error-message="กรุณากรอกเบอร์โทรศัพท์" data-parsley-type="number" data-parsley-minlength="10" required placeholder="ตัวอย่าง:099xxxxxxx" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>ประเภทการเดินทาง</label>
                                                    <select class="form-select" name="type_travel" required="" data-parsley-error-message="กรุณาระบุประเภทการเดินทาง">
                                                        <option value="" selected="">---กรุณาเลือกประเภทการเดินทาง---</option>
                                                        <option value="1">รถไฟ </option>
                                                        <option value="2">เครืองบิน</option>
                                                        <option value="3">รถยนตร์</option>
                                                        <option value="4">ทางเรือ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>ต้นทาง(กรณีมาจากต่างประเทศ)</label>
                                                    <input type="text" name="address_start" class="form-control" placeholder="ตัวอย่าง:ภูเก็ต" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>ปลายทาง</label>
                                                    <input type="text" name="address_end" class="form-control" placeholder="ตัวอย่าง:สงขลา" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label>
                                                    อัพโหลดไฟล์บัตรประชาชน
                                                    <a data-bs-toggle="tooltip" class="mm-active" data-bs-placement="right" data-bs-html="true" title="ตัวอย่างบัตรประชาชน <img src='assets/images/citizen_id.jpg' width='100%' />">
                                                        <i class="fa fa-info-circle"></i>
                                                    </a>
                                                </label>
                                                <input type="file" name="image_citizen_id" class="form-control" id="customFile" data-com.bitwarden.browser.user-edited="yes" required data-parsley-error-message="กรุณาใส่ภาพบัตรประชาชน">
                                                <p class="text-muted mb-0 mt-1 font-size-13">ขนาดไฟล์ไม่เกิน 5 MB</p>
                                            </div>
                                            <div class="mb-0 float-end">
                                                <div>
                                                    <button type="submit" name="save-data" class="btn btn-primary waves-effect waves-light me-1">
                                                        บันทึกข้อมูล
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        ล้างข้อมูล
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end row -->
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page-content -->
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <?php require_once "partials/vendor_script.php"; ?>
        <!-- form-validation -->
        <script src="assets/libs/parsleyjs/parsley.min.js"></script>
        <!-- form-validation -->
        <script src="assets/js/pages/form-validation.init.js"></script>
        <!-- dropzone -->
        <script src="assets/libs/dropzone/min/dropzone.min.js"></script>
        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <!-- Sweet alert init js-->
        <script src="assets/js/pages/sweet-alerts.init.js"></script>
        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <?php


        if (isset($_POST['save-data'])) {
            $citizen_id = $_POST['citizen_id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone_number = $_POST['phone_number'];
            $address_start = $_POST['address_start'];
            $address_end = $_POST['address_end'];
            $type_travel = $_POST['type_travel'];

            $image_citizen_id = $_FILES['image_citizen_id']['name'];
            $type = $_FILES['image_citizen_id']['type'];
            $size = $_FILES['image_citizen_id']['size'];
            $temp = $_FILES['image_citizen_id']['tmp_name'];

            $path = "uploads/citizen-id/" . $image_citizen_id;

            if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") {
                if (!file_exists($path)) { // เช็คไฟล์อัพโหลดถ้ามีใน Folder
                    if ($size < 5000000) { // เช็คขนาด file 5 MB
                        move_uploaded_file($temp, $path); //ย้้ายไฟล์รูปภาพไปใน folder
                    } else {
                        echo $errorMsg = "<script>Swal.fire({
                            icon: 'error',
                            title: 'ขนาดไฟล์ใหญ่เกินไป กรุณาอัพโหลด 5 MB !',
                            showConfirmButton: false,
                          }),setTimeout(function(){location.href='index.php'} , 2000); 
                          </script>";
                    }
                } else {
                    echo $errorMsg = "<script>Swal.fire({
                        icon: 'error',
                        title: 'กรุณาเปลี่ยนชื่อไฟล์!',
                        showConfirmButton: false,
                      }),setTimeout(function(){location.href='index.php'} , 2000); 
                      </script>";
                }
            } else {
                echo $errorMsg = "<script>Swal.fire({
                    icon: 'error',
                    title: 'อัพโหลดไฟล์ jpg, jpeg, png เท่านั้น!',
                    showConfirmButton: false,
                  }),setTimeout(function(){location.href='index.php'} , 2000); 
                  </script>";
            }
            if (!isset($errorMsg)) {
                $insertdata = new DB_con();
                $sql = $insertdata->insertdata($citizen_id, $image_citizen_id, $firstname, $lastname, $phone_number, $address_start, $address_end, $type_travel);
                if ($sql) {
                    echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    showConfirmButton: false,
                  }),setTimeout(function(){location.href='index.php'} , 1000); 
                   </script>";
                } else {
                    echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'มีข้อผิดพลาด',
                    showConfirmButton: false,
                  }),setTimeout(function(){location.href='index.php'} , 1000); 
                  </script>";
                }
            }
        }
        ?>
        <script>
            $(function() {
                $('[data-bs-toggle="tooltip"]').tooltip()
            })
        </script>
</body>

</html>