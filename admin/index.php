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
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card border border-primary">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="font-size-14 mb-2">จำนวนผู้เข้าเมืองสงขลา (รถไฟ)</p>
                                            <h4 class="mb-2">
                                                <?= $train['type_travel'] == 1 ? $train['trainCount'] : "0"; ?>
                                            </h4>

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
                        <div class="col-xl-3 col-md-6">
                            <div class="card  border border-primary">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="font-size-14 mb-2">จำนวนผู้เข้าเมืองสงขลา (เครื่องบิน)</p>
                                            <h4 class="mb-2">
                                                <?= $plane['type_travel'] == 2 ? $plane['planeCount'] : "0"; ?>
                                            </h4>
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
                        <div class="col-xl-3 col-md-6">
                            <div class="card  border border-primary">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="font-size-14 mb-2">จำนวนผู้เข้าเมืองสงขลา (รถยนต์)</p>
                                            <h4 class="mb-2">
                                                <?= $car['type_travel'] == 3 ? $car['carCount'] : "0"; ?>
                                            </h4>
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
                        <div class="col-xl-3 col-md-6">
                            <div class="card  border border-primary">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="font-size-14 mb-2">จำนวนผู้เข้าเมืองสงขลา (ทางเรือ)</p>
                                            <h4 class="mb-2">
                                                <?= $boat['type_travel'] == 4 ? $boat['boatCount'] : "0"; ?>
                                            </h4>
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
                    </div><!-- end col -->
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <?php
                                            require_once "../functions.php";
                                            $FetchDataAll = new DB_con();
                                            $sql = $FetchDataAll->FetchDataAll();
                                            $rowCount = count($sql);

                                            ?>
                                            <h4 class="fw-bold">ตารางคนเข้าเมืองจังหวัดสงขลา <span class="badge rounded-pill bg-primary">จำนวน <?= $rowCount; ?> คน</span></h4>

                                        </div>

                                    </div>
                                    <hr>

                                    <div class="table-responsive">

                                        <table id="alternative-page-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>ที่</th>
                                                    <th>บัตรประชาชน</th>
                                                    <th>รูปภาพบัตรประชาชน</th>
                                                    <th>ชื่อ</th>
                                                    <th>นามสกุล</th>
                                                    <th>เบอร์โทรศัพท์</th>
                                                    <th>ต้นทาง (กรณีมาจากต่างประเทศ)</th>
                                                    <th>ปลายทาง </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($rowCount > 0) {
                                                    foreach ($sql as $persons) {
                                                ?>
                                                        <tr>
                                                            <td><?= $persons["tbl_persons_id"]; ?></td>
                                                            <td><?= $persons["citizen_id"]; ?></td>
                                                            <td>
                                                                <a class="image-popup-vertical-fit" href="../uploads/citizen-id/<?= $persons['image_citizen_id']; ?>">
                                                                    ภาพบัตรประชาชน <i class="ri-add-circle-line"></i>
                                                                </a>
                                                            </td>
                                                            <td><?= $persons["firstname"]; ?></td>
                                                            <td><?= $persons["lastname"]; ?></td>
                                                            <td><?= $persons["phone_number"]; ?></td>
                                                            <td><?= $persons["address_start"]; ?></td>
                                                            <td><?= $persons["address_end"]; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="10" align="center">
                                                            <h5>ไม่มีข้อมูล</h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <!-- end table -->
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-xl-6">

                            <div class="card">
                                <div class="card-body pb-0">
                                    <h4 class="card-title mb-4">ประเภทการเดินทาง</h4>
                                    <canvas id="graphCanvas"></canvas>
                                </div>
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->

                        <!-- end row -->

                    </div>
                    <!-- End Page-content -->
                </div>
                <!-- end main content-->
            </div>
            <!-- END layout-wrapper -->




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
            <!-- Chart -->
            <script src="assets/libs/chart.js/Chart.bundle.min.js"></script>
            <!-- App js -->
            <script src="assets/js/app.js"></script>
            <script>
                $(document).ready(function() {
                    showGraph();
                });


                function showGraph() {

                    $.post('chartjs.php', function(data) {
                        console.log(data);
                        let travel_name = [];
                        let counts = [];

                        for (let i in data) {
                            travel_name.push(data[i].travel_name)
                            counts.push(data[i].counts)
                        }

                        let pieChart = {
                            labels: travel_name,
                            datasets: [{
                                label: 'test',
                                data: counts,
                                backgroundColor: [
                                    "#fcb92c",
                                    "#1cbb8c",
                                    "#f32f53",
                                    "#0f9cf"
                                ],
                                hoverBorderColor: "#fff"
                            }]
                        };
                        let graphTarget = $('#graphCanvas');
                        let barGraph = new Chart(graphTarget, {
                            type: 'pie',
                            data: pieChart
                        })

                    })
                }
            </script>

</body>

</html>