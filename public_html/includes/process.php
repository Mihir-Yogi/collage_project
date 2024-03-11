<?php 

include_once("../database/constant.php");
include_once("../includes/user.php");
include_once("../includes/DBoperation.php");

// for registration

if(isset($_POST["username"]) AND isset($_POST["email"])){
    $user = new User();
    $result = $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
    echo $result;
    exit();
}

// $user = new User();
// echo $user->createUserAccount("Test5","test5@gmail.com","1234567890","Admin");

// for login

if(isset($_POST["log_email"]) AND isset($_POST["log_password"])){
    $user = new User();
    $result = $user->userLogin($_POST["log_email"],$_POST["log_password"]);
    echo $result;
    exit();
}

// to getCamera

if(isset($_POST["getCamera"])){
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("camera");
    foreach ($rows as $row){
        echo "<option value='".$row["category"]."'>".$row["make"]."</option>";
    }
    exit();
}else{
    echo "error";
}

?>