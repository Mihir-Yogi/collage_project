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
    public function addCamera($cam_make,$serial_no, $ch,$mega_pixel,$purchase_date,$camera_d_cat,$camera_c_cat, $location,$warranty,$ex_date,$status){
        $pre_stmt = $this->con->prepare("INSERT INTO `camera_collection` (`make`,`serial_no`,`ch`,`mega_pixel`,`purchase_date`,`depot`,`category`,`location`,`warranty`,`ex_date`,`status`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        
        if (!$pre_stmt) {
            die("Error in SQL query: " . $this->con->error);
        }

        $pre_stmt->bind_param("siiissssisi",$cam_make,$serial_no,$ch,$mega_pixel,$purchase_date,$camera_d_cat,$camera_c_cat, $location,$warranty,$ex_date,$status);
        $result =$pre_stmt->execute() or die($this->con->error);
        if($result){
            return "CAMERA_ADDED";
        }else{
            return "error";
        }
    }

    //add combo

    public function addDevice($device_category,$make,$serial_no, $ch,$purchase_date,$depot,$category,$warranty,$ex_date,$status){
        $pre_stmt = $this->con->prepare("INSERT INTO `device_collection`(`device_category`, `make`, `serial_no`,`ch`, `purchase_date`, `depot`, `category`, `warrenty`, `expiery_date`,`status`)
        VALUES (?,?,?,?,?,?,?,?,?,?)");

        if(!$pre_stmt){
            die("Error in SQL query: " . $this->con->error);
        }

        $pre_stmt->bind_param("ssiisiiisi",$device_category,$make,$serial_no, $ch,$purchase_date,$depot,$category,$warranty,$ex_date,$status);
        $result =$pre_stmt->execute() or die($this->con->error);
        if($result){
            return "DEVICE_ADDED";
        }else{
            return "error";
        }
    }

    public function addNewDevice($device_category,$make,$serial_no,$purchase_date,$depot,$category,$warranty,$ex_date,$status){
        $pre_stmt = $this->con->prepare("INSERT INTO `device_collection`(`device_category`, `make`, `serial_no`, `purchase_date`, `depot`, `category`, `warrenty`, `expiery_date`,`status`)
        VALUES (?,?,?,?,?,?,?,?,?)");

        if(!$pre_stmt){
            die("Error in SQL query: " . $this->con->error);
        }

        $pre_stmt->bind_param("ssisiiisi",$device_category,$make,$serial_no,$purchase_date,$depot,$category,$warranty,$ex_date,$status);
        $result =$pre_stmt->execute() or die($this->con->error);
        if($result){
            return "DEVICE_ADDED";
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

    
    public function insertRowData($rowData) {

        $remark = isset($rowData['remark']) ? $rowData['remark'] : '';

        $sql = "INSERT INTO `camera_status`(`device_category`,`city`, `depot`, `location`, `make`, `serial_no`, `megapixel`, `purchase_date`, `expiry_date`, `ins_date`, `status` , `remark`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->con->prepare($sql);
        if (!$stmt) {
            die("Error in SQL query: " . $this->con->error);    
        }
        $stmt->bind_param("ssssssisssss", $rowData['device'], $rowData['Depot'], $rowData['Location'], $rowData['Camera Location'], $rowData['make'], $rowData['serial no'], $rowData['megapixel'], $rowData['purchase'], $rowData['expiry'], $rowData['insert'], $rowData['status'], $remark);
        $stmt->execute();
        if ($stmt->errno) {
            die("Error executing SQL query: " . $stmt->error);
        }
        $rowsAffected = $stmt->affected_rows;
        $stmt->close();
        return $rowsAffected;
    }




}



// $opr = new DBoperation();
// echo $opr->addDevice("nvr",1,"demo",568, 4,2005-02-20,"mehsana","depot1",5,2005-02-20,1);

// echo"<pre>"

// $opr = new DBoperation();
// echo $opr->addChildCategory("nixon1","ramu");
// echo "<pre>";
// print_r($opr->getAllRecord("camera"));

?>
