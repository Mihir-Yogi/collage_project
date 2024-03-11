<?php 

class DBoperation {
    private $con;

    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    public function addCamera($category, $make, $serial_no, $mega_pixel, $purchase_date, $warranty, $ex_date, $ins_date){
        $pre_stmt = $this->con->prepare("INSERT INTO `camera`(`category`, `make`, `serial_no`, `mega_pixel`, `purchase_date`, `warranty`, `ex_date`, `ins_date`, `status`) 
        VALUES (?,?,?,?,?,?,?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("isiisissi",$category,$make,$serial_no,$mega_pixel,$purchase_date,$warranty,$ex_date,$ins_date,$status);
        $result =$pre_stmt->execute() or die($this->con->error);
        if($result){
            return "CATEGORY_ADDED";
        }else{
            return 0;
        }
    }

    public function getAllRecord($table){
        $pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
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
}

// $opr = new DBoperation();
// echo $opr->addCamera(2,"sony",11221111,40,"2024-03-11", 1 , "2025-03-11", "2025-03-11");
// echo "<pre>";
// print_r($opr->getAllRecord("camera"));

?>
