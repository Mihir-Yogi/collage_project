<?php 

class DBoperation {
    private $con;

    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }
    //category data
    public function addCategory($category_name){
        $pre_stmt = $this->con->prepare("INSERT INTO `category` (`category_name`,`status`) 
        VALUES (?,?)");

        if (!$pre_stmt) {
            die("Error in SQL query: " . $this->con->error);
        }

        $status = 1;
        $pre_stmt->bind_param("si",$category_name,$status);
        $result =$pre_stmt->execute() or die($this->con->error);
        if($result){
            return "CATEGORY_ADDED";
        }else{
            return "error";
        }
    }

    //child category data
    public function addChildCategory($child_name,$parentCategory){
        $pre_stmt = $this->con->prepare("INSERT INTO `child_category` (`child_name`,`parent_id`,`status`) 
        VALUES (?,?,?)");
        
        if (!$pre_stmt) {
            die("Error in SQL query: " . $this->con->error);
        }

        $status = 1;
        $pre_stmt->bind_param("ssi",$child_name,$parentCategory,$status);
        $result =$pre_stmt->execute() or die($this->con->error);
        if($result){
            return "CATEGORY_ADDED";
        }else{
            return "error";
        }
    }

    //add camera
    public function addCamera($cam_make,$serial_no,$mega_pixel,$purchase_date,$camera_d_cat,$camera_c_cat,$warranty,$ex_date){
        $pre_stmt = $this->con->prepare("INSERT INTO `camera_collection` (`make`,`serial_no`,`mega_pixel`,`purchase_date`,`depot`,`category`,`warranty`,`ex_date`) 
        VALUES (?,?,?,?,?,?,?,?)");
        
        if (!$pre_stmt) {
            die("Error in SQL query: " . $this->con->error);
        }

        $pre_stmt->bind_param("siisssis",$cam_make,$serial_no,$mega_pixel,$purchase_date,$camera_d_cat,$camera_c_cat,$warranty,$ex_date);
        $result =$pre_stmt->execute() or die($this->con->error);
        if($result){
            return "CAMERA_ADDED";
        }else{
            return "error";
        }
    }

    //add nvr 

    public function addNvr($section,$nvr_make,$nvr_serial_no,$nvr_purchase_date,$depot,$category,$nvr_warranty,$nvr_ex_date){
        $pre_stmt = $this->con->prepare("INSERT INTO `nvr_collection`(`section`, `make`, `serial_no`, `purchase_date`, `depot`, `category`, `warrenty`, `expiery_date`)
        VALUES (?,?,?,?,?,?,?,?)");

        if(!$pre_stmt){
            die("Error in SQL query: " . $this->con->error);
        }

        $pre_stmt->bind_param("isisiiis",$section,$nvr_make,$nvr_serial_no,$nvr_purchase_date,$depot,$category,$nvr_warranty,$nvr_ex_date);
        $result =$pre_stmt->execute() or die($this->con->error);
        if($result){
            return "NVR_ADDED";
        }else{
            return "error";
        }
    }
    public function addDvr($section,$dvr_make,$dvr_serial_no,$dvr_purchase_date,$depot,$category,$dvr_warranty,$dvr_ex_date){
        $pre_stmt = $this->con->prepare("INSERT INTO `dvr_collection`(`section`, `make`, `serial_no`, `purchase_date`, `depot`, `category`, `warrenty`, `expiery_date`)
        VALUES (?,?,?,?,?,?,?,?)");

        if(!$pre_stmt){
            die("Error in SQL query: " . $this->con->error);
        }

        $pre_stmt->bind_param("isisiiis",$section,$dvr_make,$dvr_serial_no,$dvr_purchase_date,$depot,$category,$dvr_warranty,$dvr_ex_date);
        $result =$pre_stmt->execute() or die($this->con->error);
        if($result){
            return "DVR_ADDED";
        }else{
            return "error";
        }
    }
    public function addHdd($section,$hdd_make,$hdd_serial_no,$hdd_purchase_date,$depot,$category,$hdd_warranty,$hdd_ex_date){
        $pre_stmt = $this->con->prepare("INSERT INTO `hdd_collection`(`section`, `make`, `serial_no`, `purchase_date`, `depot`, `category`, `warrenty`, `expiery_date`)
        VALUES (?,?,?,?,?,?,?,?)");

        if(!$pre_stmt){
            die("Error in SQL query: " . $this->con->error);
        }

        $pre_stmt->bind_param("isisiiis",$section,$hdd_make,$hdd_serial_no,$hdd_purchase_date,$depot,$category,$hdd_warranty,$hdd_ex_date);
        $result =$pre_stmt->execute() or die($this->con->error);
        if($result){
            return "HDD_ADDED";
        }else{
            return "error";
        }
    }

    public function getAllRecord($table){
        $pre_stmt = $this->con->prepare("SELECT * FROM category");
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        return "No_DATA";
    }

    // Fetch NVR data based on depot, category, and section
    public function fetchNvrData($depot, $category, $section) {
        $sql = "SELECT make, serial_no, purchase_date, warranty, expiry_date FROM nvr_collection WHERE depot = ? AND category = ? AND section = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iii", $depot, $category, $section);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    // Fetch DVR data based on depot, category, and section
    public function fetchDvrData($depot, $category, $section) {
        $sql = "SELECT make, serial_no, purchase_date, warranty, expiry_date FROM dvr_collection WHERE depot = ? AND category = ? AND section = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iii", $depot, $category, $section);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    // Fetch HDD data based on depot, category, and section
    public function fetchHddData($depot, $category, $section) {
        $sql = "SELECT make, serial_no, purchase_date, warranty, expiry_date FROM hdd_collection WHERE depot = ? AND category = ? AND section = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iii", $depot, $category, $section);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}


$dbOperation = new DBoperation();
// Sample depot, category, and section values
$depot = 1;
$category = 1;
$section = 1;

// Test fetching NVR data
$nvrData = $dbOperation->fetchNvrData($depot, $category, $section);
echo "NVR Data:\n";
print_r($nvrData);

// Test fetching DVR data
$dvrData = $dbOperation->fetchDvrData($depot, $category, $section);
echo "DVR Data:\n";
print_r($dvrData);

// Test fetching HDD data
$hddData = $dbOperation->fetchHddData($depot, $category, $section);
echo "HDD Data:\n";
print_r($hddData);
// $opr = new DBoperation();
// echo $opr->addNvr(9,"depot",123,2024-05-15,7,1,7,2025-05-15);
// echo"<pre>"

// $opr = new DBoperation();
// echo $opr->addChildCategory("nixon1","ramu");
// echo "<pre>";
// print_r($opr->getAllRecord("camera"));

?>
