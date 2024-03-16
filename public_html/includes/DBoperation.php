<?php 

class DBoperation {
    private $con;

    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
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
}
// $opr = new DBoperation();
// echo $opr->addChildCategory("nixon1","ramu");
// echo "<pre>";
// print_r($opr->getAllRecord("camera"));

?>
