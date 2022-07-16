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
                                <th class="text-warning">แก้ไข </th>
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
                                        <td><a href="persons.php?id=<?= $persons['tbl_persons_id']; ?>" class="text-warning"><i class="ri-pencil-line font-size-18"></i></a></a></td>
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