<?php
require_once "../functions.php";
print_r($_POST);
if (isset($_POST['delete'])) {
    $tbl_persons_id = $_POST['tbl_persons_id'];
    $type_travel = $_POST['type_travel'];
    $image_citizen_id = $_POST['image_citizen_id'];
    $directory = "../uploads/citizen-id/";
    $DeletePerson = new DB_con();
    $sql = $DeletePerson->DeletePerson($tbl_persons_id, $type_travel);
    if ($sql) {
        unlink($directory . $image_citizen_id );
    } else {
        echo "error";
    }
}
