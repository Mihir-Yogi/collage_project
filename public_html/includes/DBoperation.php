<?php 

class DBoperation {
    private $con;

    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    // public function addCategory($category, $category_name, $serial_no, $mega_pixel, $purchase_date, $warranty, $ex_date, $ins_date){
    //     $pre_stmt = $this->con->prepare("INSERT INTO `category`(`category`, `category_name`, `serial_no`, `mega_pixel`, `purchase_date`, `warranty`, `ex_date`, `ins_date`, `status`) 
    //     VALUES (?,?,?,?,?,?,?,?,?)");
    //     $status = 1;
    //     $pre_stmt->bind_param("isiisissi",$category,$category_name,$serial_no,$mega_pixel,$purchase_date,$warranty,$ex_date,$ins_date,$status);
    //     $result =$pre_stmt->execute() or die($this->con->error);
    //     if($result){
    //         return "CATEGORY_ADDED";
    //     }else{
    //         return 0;
    //     }
    // }
    public function addCategory($depot_category, $category_name){
        $pre_stmt = $this->con->prepare("INSERT INTO `category`(`depot_category`, `category_name`,`status`) 
        VALUES (?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("isi",$depot_category,$category_name,$status);
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
// echo $opr->addCategory(2,"nexon");
// echo "<pre>";
// print_r($opr->getAllRecord("camera"));

?>
