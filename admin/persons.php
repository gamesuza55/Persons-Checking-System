<?php
require_once "../functions.php";
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

    <?php require_once "partials/header_css.html"; ?>
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Lightbox css -->
    <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
</head>

<body data-topbar="dark" data-layout="horizontal" data-layout-size="boxed">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php
        require_once "partials/header.php";
        require_once "partials/topnav.php";
        ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content " style="margin-top: 150px;">
                <div class="container-fluid">
                    <!-- end col -->
                    <?php

                    if (isset($_GET['id'])) {
                        require_once "persons-update.php";
                    } else {
                        require_once "persons-show.php";
                    }
                    ?>

                    <!-- End Page-content -->
                </div>
                <!-- end main content-->
            </div>
            <!-- END layout-wrapper -->
        </div>
    </div>

    <?php require_once "partials/vendor_script.php"; ?>
    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>
    <!-- Magnific Popup-->
    <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- lightbox init js-->
    <script src="assets/js/pages/lightbox.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <?php
    if (isset($_POST['update'])) {
        $tbl_persons_id = $_GET['id'];
        $citizen_id = $_POST['citizen_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone_number = $_POST['phone_number'];
        $address_start = $_POST['address_start'];
        $address_end = $_POST['address_end'];

        $image_citizen_id = $_FILES['image_citizen_id']['name'];
        $type = $_FILES['image_citizen_id']['type'];
        $size = $_FILES['image_citizen_id']['size'];
        $temp = $_FILES['image_citizen_id']['tmp_name'];

        $path = "../uploads/citizen-id/" . $image_citizen_id;
        $directory = "../uploads/citizen-id/";

        if ($image_citizen_id) {
            if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") {
                if (!file_exists($path)) { // เช็คไฟล์อัพโหลดถ้ามีใน Folder
                    if ($size < 5000000) { // เช็คขนาด file 5 MB
                        unlink($directory . $persons['image_citizen_id']);
                        move_uploaded_file($temp, $path); //ย้้ายไฟล์รูปภาพไปใน folder
                    } else {
                        echo $errorMsg = "<script>Swal.fire({
                                icon: 'error',
                                title: 'ขนาดไฟล์ใหญ่เกินไป กรุณาอัพโหลด 5 MB !',
                                showConfirmButton: false,
                              }),setTimeout(function(){location.href='persons.php'} , 2000); 
                              </script>";
                    }
                } else {
                    echo $errorMsg = "<script>Swal.fire({
                            icon: 'error',
                            title: 'กรุณาเปลี่ยนชื่อไฟล์!',
                            showConfirmButton: false,
                          }),setTimeout(function(){location.href='persons.php'} , 2000); 
                          </script>";
                }
            } else {
                echo $errorMsg = "<script>Swal.fire({
                        icon: 'error',
                        title: 'อัพโหลดไฟล์ jpg, jpeg, png เท่านั้น!',
                        showConfirmButton: false,
                      }),setTimeout(function(){location.href='persons.php'} , 2000); 
                      </script>";
            }
        } else {
            $image_citizen_id  = $persons['image_citizen_id'];
        }
        if (!isset($errorMsg)) {
            $sql = $trainCount->UpdatePersons($citizen_id, $image_citizen_id, $firstname, $lastname, $phone_number, $address_start, $address_end, $tbl_persons_id);
            if ($sql) {
                echo "<script>Swal.fire({
                            icon: 'success',
                            title: 'อัพเดทข้อมูลสำเร็จ!',
                            showConfirmButton: false,
                          }),setTimeout(function(){location.href='persons.php'} , 1000); 
                           </script>";
            } else {
                echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'มีข้อผิดพลาด!,
                            showConfirmButton: false,
                          }),setTimeout(function(){location.href='persons.php'} , 1000); 
                          </script>";
            }
        }
    }


    ?>

    <script>
        $(".delete-persons").click(function(e) {
            e.preventDefault();
            let tbl_persons_id = $(this).attr('data-persons-id')
            let type_travel = $(this).attr('data-type-travel')
            let image_citizen_id = $(this).attr('data-image-citizen-id')
            // console.log(image_citizen_id)

            Swal.fire({
                title: 'ลบข้อมูล',
                text: "คุณต้องการลบข้อมูลหรือไม่ ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'persons-delete.php',
                        type: 'POST',
                        data: {
                            delete: 'delete',
                            tbl_persons_id: tbl_persons_id,
                            type_travel: type_travel,
                            image_citizen_id: image_citizen_id
                        },
                        success: function(data) {
                            console.log(data);
                            Swal.fire({
                                icon: 'success',
                                title: 'ลบข้อมูล',
                                text: 'ลบข้อมูลสำเร็จ!',
                                showConfirmButton: false,
                            })
                            setTimeout(function() {
                                window.location.href = "persons.php"
                            }, 1500);
                        }
                    })
                }
            })
        });
    </script>
</body>

</html>