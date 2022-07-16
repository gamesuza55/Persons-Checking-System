<?php
session_start();
ob_start();
// define('DB_SERVER', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'personal_tracking_system');

class DB_con
{
    // ========================== ประกาศ DATABASE ========================== 
    function __construct()
    {
        try {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "personal_checking_system";

            $dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->dbcon = $dbh;
        } catch (PDOException $e) {
            print "Error!:" . $e->getMessage() . "<br/> ";
            die();
        }
    }
    // ========================== Check login ========================== 
    public function LoginSessionCheck()
    {
        if (!$_SESSION['username']) {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'เฉพาะ Administration เท่านั้น!',
                showConfirmButton: false,
            }),setTimeout(function(){location.href='../auth-login.php'} , 1000); 
        </script>";
        }
    }
    // ========================== ดึงข้อมูลจากตาราง tbl_persons ทั้งหมด  ========================== 
    public function CheckUser($username, $password)
    {
        try {
            if (isset($_POST['submit-login'])) {
                $sql = "SELECT * FROM tbl_users WHERE username = :username AND password = :password ";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                $users = $stmt->fetch();
                if (isset($username) == $users['username']) {
                    if (isset($password) == $users['password']) {
                        $_SESSION['username'] = $users['username'];
                        $_SESSION['random'] = rand(9999, 99999);
                        echo "<script>Swal.fire({
                                icon: 'success',
                                title: 'เข้าสู่ระบบสำเร็จ!',
                                showConfirmButton: false,
                            }),setTimeout(function(){location.href='admin/index.php'} , 1000); 
                        </script>";
                    }
                } else {
                    echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด!',
                            showConfirmButton: false,
                        }),setTimeout(function(){location.href='auth-login.php'} , 1000); 
                    </script>";
                }
            }
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/>";
        }
    }

    // ========================== เพิ่มข้อมูลตาราง tbl_persons   ========================== 
    public function insertdata($citizen_id, $image_citizen_id, $firstname, $lastname, $phone_number, $address_start, $address_end, $type_travel)
    {
        try {
            $sql = "INSERT INTO tbl_persons(citizen_id, image_citizen_id, firstname, lastname, phone_number, address_start, address_end, type_travel) VALUES(:citizen_id, :image_citizen_id, :firstname, :lastname, :phone_number, :address_start, :address_end, :type_travel)";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->bindParam(':citizen_id', $citizen_id);
            $stmt->bindParam(':image_citizen_id', $image_citizen_id);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':address_start', $address_start);
            $stmt->bindParam(':address_end', $address_end);
            $stmt->bindParam(':type_travel', $type_travel);
            if ($stmt->execute()) {
                $sql = "UPDATE tbl_type_travel SET counts = +1 WHERE type_travel_id = $type_travel";
                $stmt = $this->dbcon->prepare($sql);
                return $stmt->execute();
            }
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/> ";
        }
    }
    // ==========================   update Persons ========================== 
    function UpdatePersons($citizen_id, $image_citizen_id, $firstname, $lastname, $phone_number, $address_start, $address_end, $tbl_persons_id)
    {
        try {
            $sql = "UPDATE tbl_persons SET citizen_id = :citizen_id, image_citizen_id = :image_citizen_id, firstname = :firstname, lastname = :lastname, phone_number = :phone_number, address_start = :address_start, address_end = :address_end  WHERE tbl_persons_id = :tbl_persons_id ";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->bindParam(':citizen_id', $citizen_id);
            $stmt->bindParam(':image_citizen_id', $image_citizen_id);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':address_start', $address_start);
            $stmt->bindParam(':address_end', $address_end);
            $stmt->bindParam(':tbl_persons_id', $tbl_persons_id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/> ";
        }
    }
    // ==========================  Delete Persons ========================== 
    function DeletePerson($tbl_persons_id, $type_travel)
    {
        try {
            $sql = "UPDATE tbl_type_travel SET counts = counts - 1 WHERE type_travel_id = $type_travel";
            $stmt = $this->dbcon->prepare($sql);
            if ($stmt->execute()) {
                $sql = "DELETE FROM tbl_persons WHERE tbl_persons_id = :tbl_persons_id";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->bindParam(':tbl_persons_id', $tbl_persons_id);
                return $stmt->execute();
            }
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/>";
        }
    }
    // ========================== ดึงข้อมูลจากตาราง tbl_persons ทั้งหมด  ========================== 
    public function FetchDataAll()
    {
        try {
            $sql = "SELECT * FROM tbl_persons";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute();
            $persons = $stmt->fetchAll();
            return $persons;
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/>";
        }
    }
    // ========================== ดึงข้อมูลจากตาราง tbl_persons WHERE id  ========================== 
    public function FetchDataOne($tbl_persons_id)
    {
        try {
            $sql = "SELECT * FROM tbl_persons WHERE tbl_persons_id = :tbl_persons_id ";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->bindParam(':tbl_persons_id', $tbl_persons_id);
            $stmt->execute();
            $persons = $stmt->fetch();
            return $persons;
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/>";
        }
    }
    // ========================== นับจำนวนรถไฟ  ========================== 
    public function trainCount()
    {
        try {
            $sql = "SELECT Count(type_travel) AS trainCount,type_travel FROM tbl_persons WHERE type_travel = 1";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute();
            $persons = $stmt->fetch();
            return $persons;
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/>";
        }
    }
    // ==========================  นับจำนวนเครื่องบิน ========================== 
    public function planeCount()
    {
        try {
            $sql = "SELECT Count(type_travel) AS planeCount,type_travel FROM tbl_persons WHERE type_travel = 2";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute();
            $persons = $stmt->fetch();
            return $persons;
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/>";
        }
    }
    // ==========================  นับจำนวนรถยนตร์ ========================== 
    public function carCount()
    {
        try {
            $sql = "SELECT Count(type_travel) AS carCount,type_travel FROM tbl_persons WHERE type_travel = 3";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute();
            $persons = $stmt->fetch();
            return $persons;
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/>";
        }
    }
    // ==========================  นับจำนวนทางเรือ ========================== 
    public function boatCount()
    {
        try {
            $sql = "SELECT Count(type_travel) AS boatCount,type_travel FROM tbl_persons WHERE type_travel = 4";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute();
            $persons = $stmt->fetch();
            return $persons;
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/>";
        }
    }
    // ==========================  Show dashboard Persons ========================== 
    function ChartJsTravel()
    {
        try {
            header('Content-Type: application.json');
            $sql = "SELECT * FROM tbl_type_travel  ORDER BY type_travel_id";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute();
            $travels = $stmt->fetchAll();
            $data = array();
            foreach ($travels as $travel) {
                $data[] = $travel;
            }
        } catch (PDOException $e) {
            return "Error!:" . $e->getMessage() . "<br/>";
        }
        $this->dbcon = null;

        echo json_encode($data);
    }
}
