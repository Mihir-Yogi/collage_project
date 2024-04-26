<?php
include_once("../database/constant.php");
include_once("../database/db.php");


$db = new Database();
$con = $db->connect();

if(isset($_POST['type']) == ""){

    $sql = "SELECT * FROM category ";

    $query = mysqli_query($con,$sql) or die("Query unsuccessful!!");
    
    $str = "";
    
    while($row = mysqli_fetch_assoc($query)){
        $str .= "<option value='{$row['pid']}'>{$row['category_name']}</option>";
    }
}else if($_POST['type'] == "childData"){

    $sql = "SELECT * FROM child_category WHERE parent_id = {$_POST['id']}";

    $query = mysqli_query($con,$sql) or die("Query unsuccessful!!");
    
    $str = "";
    
    while($row = mysqli_fetch_assoc($query)){
        $str .= "<option value='{$row['cid']}'>{$row['child_name']}</option>";
    }
}



echo $str;
?>
