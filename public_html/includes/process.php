<?php 

include_once("../database/constant.php");
include_once("../includes/user.php");
include_once("../database/db.php");
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


if(isset($_POST["cam_make"]) && isset($_POST["serial_no"]) && isset($_POST["mega_pixel"]) && isset($_POST["purchase_date"]) && isset($_POST["camera_d_cat"]) && isset($_POST["camera_c_depot"]) && isset($_POST["warranty"]) && isset($_POST["ex_date"])) {
    $camMake = $_POST["cam_make"];
    $serialNo = $_POST["serial_no"];
    $megaPixel = $_POST["mega_pixel"];
    $purchaseDate = $_POST["purchase_date"];
    $cameraDCat = $_POST["camera_d_cat"];
    $cameraCDepot = $_POST["camera_c_depot"];
    $warranty = $_POST["warranty"];
    $exDate = $_POST["ex_date"];


    $dbOperation = new DBoperation();
    $result = $dbOperation->addCamera($camMake, $serialNo, $megaPixel, $purchaseDate, $cameraDCat, $cameraCDepot, $warranty, $exDate);
    echo $result;
    // if($result === true) {
    //     echo "CAMERA_ADDED";
    // } else {
    //     echo "Error: " . $result; 
    // }
    exit();
}



// to getCategory

if(isset($_POST["getCategory"])){
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("category");
    $options = "";
    foreach ($rows as $row){
        $options .=  "<option value='".$row["pid"]."'>".$row["category_name"]."</option>";
    }
    echo $options;
    exit();
}

// Add new child category
if (isset($_POST['child_name']) && isset($_POST['parent_category'])) {
    $child_name = $_POST['child_name'];
    $parentCategory = $_POST['parent_category']; // Change to 'parent_category'

    $dbOperation = new DBoperation();
    $result = $dbOperation->addChildCategory($child_name, $parentCategory); 

    if ($result === "CATEGORY_ADDED") {
        echo "CATEGORY_ADDED";
    } else {
        echo "ERROR";   
    }
}


// Add new category
if (isset($_POST['category_name'])) {
    $category_name = $_POST['category_name'];

    // echo "Received child_name: " . $category_name . "<br>";

    $dbOperation = new DBoperation();
    $result = $dbOperation->addCategory($category_name);

    if ($result == "CATEGORY_ADDED") {
        echo "CATEGORY_ADDED";
    } else {
        echo "ERROR";   
    }
}


?>