<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <?php
                        $tbl_persons_id = $_GET['id'];
                        $FetchDataOne = new DB_con();
                        $persons = $FetchDataOne->FetchDataOne($tbl_persons_id);
                        ?>
                        <h4 class="fw-bold">ตารางคนเข้าเมืองจังหวัดสงขลา <span class="badge rounded-pill bg-warning">อัพเดท</span> </h4>

                    </div>

                </div>
                <hr>
                <form method="POST" enctype="multipart/form-data" id="form-personal">
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
                                    <th class="text-success">อัพเดท</th>
                                    <th class="text-danger">ลบ </th>
                                </tr>

                            <tbody>
                                <tr>
                                    <td><?= $persons["tbl_persons_id"]; ?></td>
                                    <td><input type="text" name="citizen_id" class="form-control" maxlength="13" value="<?= $persons["citizen_id"]; ?>"></td>
                                    <td align="center">
                                        <input type="file" name="image_citizen_id" class="form-control">
                                        <a class="image-popup-vertical-fit text-center" href="../uploads/citizen-id/<?= $persons['image_citizen_id']; ?>">
                                            ภาพบัตรประชาชน <i class="ri-add-circle-line"></i>
                                        </a>
                                    </td>
                                    <td><input type="text" name="firstname" class="form-control" value="<?= $persons["firstname"]; ?>"></td>
                                    <td><input type="text" name="lastname" class="form-control" value="<?= $persons["lastname"]; ?>"></td>
                                    <td><input type="text" name="phone_number" class="form-control" maxlength="10" value="<?= $persons["phone_number"]; ?>"></td>
                                    <td><input type="text" name="address_start" class="form-control" value="<?= $persons["address_start"]; ?>"></td>
                                    <td><input type="text" name="address_end" class="form-control" value="<?= $persons["address_end"]; ?>"></td>

                                    <td><button type="submit" name="update" class="btn btn-link" style="color:#6fd088;"><i class="ri-checkbox-circle-line font-size-18"></i></button></a></td>
                                    <td>
                                        <button type="submit" name="delete" class="btn btn-link delete-persons" data-persons-id="<?= $persons["tbl_persons_id"]; ?>" data-type-travel="<?= $persons["type_travel"]; ?>" data-image-citizen-id="<?= $persons['image_citizen_id']; ?>" style="color:#f32f53;"><i class="ri-delete-bin-5-line font-size-18"></i></a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                        <!-- end table -->
                    </div>
                </form>
            </div><!-- end card -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>