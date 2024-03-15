<?php 

class DBoperation {
    private $con;

    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }
    // public function addCategory($category_name){
    //     $pre_stmt = $this->con->prepare("INSERT INTO `category`(`category_name`,`status`) 
    //     VALUES (?,?)");
    //     $status = 1;
    //     $pre_stmt->bind_param("si",$category_name,$status);
    //     $result =$pre_stmt->execute() or die($this->con->error);
    //     if($result){
    //         return "CATEGORY_ADDED";
    //     }else{
    //         return 0;
    //     }
    // }



    public function addCategory($child_name,$selected_index){
        $pre_stmt = $this->con->prepare("INSERT INTO `child_category` (`child_name`,`parent_id`,`status`) 
        VALUES (?,?,?)");
        
        if (!$pre_stmt) {
            die("Error in SQL query: " . $this->con->error);
        }

        $status = 1;
        $pre_stmt->bind_param("sii",$child_name,$selected_index,$status);
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
// echo $opr->addCategory("nixon1",4);
// echo "<pre>";
// print_r($opr->getAllRecord("camera"));

?>
