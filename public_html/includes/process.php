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

// to getCategory

if(isset($_POST["getCategory"])){
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("category");
    foreach ($rows as $row){
        echo "<option value='".$row["pid"]."'>".$row["category_name"]."</option>";
    }
    exit();
}

// Add new child category
if (isset($_POST['child_name']) && isset($_POST['selected_index'])) {
    $child_name = $_POST['child_name'];
    $selected_index = $_POST['selected_index'];

    // echo "Received child_name: " . $child_name . "<br>";
    // echo "Received selected_index: " . $selected_index . "<br>";

    $dbOperation = new DBoperation();
    $result = $dbOperation->addCategory($child_name, $selected_index);

    if ($result == "CATEGORY_ADDED") {
        echo "CATEGORY_ADDED";
    } else {
        echo "ERROR";   
    }
} else {
    echo "Invalid Request";
}
?>