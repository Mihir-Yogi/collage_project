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

// login 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["log_email"]) && isset($_POST["log_password"])) {
    session_start();
    $user = new User();
    $result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);
    if ($result === true) {
        
        if ($_SESSION['user_type'] == "Admin") {
            echo "adminDashboard.php"; 
        }else if($_SESSION['user_type'] == "other") {
            echo "user_dashboard.php";
        }
    } else if ($result === false) {
        echo "Database error occurred";
    } else {
        echo $result;
    }
    exit();
}



//add camera 

if(isset($_POST["cam_make"]) && isset($_POST["serial_no"]) && isset($_POST["camera_ch"])  && isset($_POST["mega_pixel"]) && isset($_POST["purchase_date"]) && isset($_POST["camera_d_cat"]) && isset($_POST["camera_c_depot"]) && isset($_POST["location"]) && isset($_POST["warranty"]) && isset($_POST["ex_date"])) {
    $camMake = $_POST["cam_make"];
    $serialNo = $_POST["serial_no"];
    $ch = $_POST["camera_ch"];
    $megaPixel = $_POST["mega_pixel"];
    $purchaseDate = $_POST["purchase_date"];
    $cameraDCat = $_POST["camera_d_cat"];
    $cameraCDepot = $_POST["camera_c_depot"];
    $location = $_POST["location"];
    $warranty = $_POST["warranty"];
    $exDate = $_POST["ex_date"];
    $status = 1;

    $dbOperation = new DBoperation();
    $result = $dbOperation->addCamera($camMake, $serialNo, $ch, $megaPixel, $purchaseDate, $cameraDCat, $cameraCDepot, $location, $warranty, $exDate,$status);
    echo $result;
    // if($result === true) {
    //     echo "CAMERA_ADDED";
    // } else {
    //     echo "Error: " . $result; 
    // }
    exit();
}


    $response = array();

//add combo
    if(isset($_POST["combo_d_cat"]) && isset($_POST["combo_c_depot"])) {
        $depot = $_POST["combo_d_cat"];
        $category = $_POST["combo_c_depot"];
    
        $dbOperation = new DBoperation();
    

        $device_status = false;

        // Add NVR data
        if(isset($_POST["nvr_make"]) && isset($_POST["nvr_serial_no"]) && isset($_POST["combo_ch"]) && isset($_POST["nvr_purchase_date"]) && isset($_POST["nvr_warranty"]) && isset($_POST["nvr_ex_date"])) {
            
            $device_category = "nvr";
            $make = $_POST["nvr_make"];
            $serial_no = $_POST["nvr_serial_no"];
            $ch = $_POST["combo_ch"];
            $purchase_date = $_POST["nvr_purchase_date"];
            $warranty = $_POST["nvr_warranty"];
            $ex_date = $_POST["nvr_ex_date"];   
            $status = 1;
    
            $result_nvr = $dbOperation->addDevice($device_category, $make, $serial_no, $ch, $purchase_date, $depot, $category, $warranty, $ex_date,$status);
    
            if($result_nvr == "DEVICE_ADDED"){
                $device_status = true;
            }else{
                $device_status = false;
            }
        }
    
        // Add DVR data
        if(isset($_POST["dvr_make"]) && isset($_POST["dvr_serial_no"]) && isset($_POST["dvr_ch"]) && isset($_POST["dvr_purchase_date"]) && isset($_POST["dvr_warranty"]) && isset($_POST["dvr_ex_date"])) {
        
            $device_category = "dvr";
            $dvr_make = $_POST["dvr_make"];
            $dvr_serial_no = $_POST["dvr_serial_no"];
            $ch = $_POST["dvr_ch"];
            $dvr_purchase_date = $_POST["dvr_purchase_date"];
            $dvr_warranty = $_POST["dvr_warranty"];
            $dvr_ex_date = $_POST["dvr_ex_date"];
            $status = 1;
    
            $result_dvr = $dbOperation->addDevice($device_category, $dvr_make, $dvr_serial_no, $ch, $dvr_purchase_date, $depot, $category, $dvr_warranty, $dvr_ex_date,$status);
            
            if($result_dvr == "DEVICE_ADDED"){
                $device_status = true;
            }else{
                $device_status = false;
            }
        }
    
        // Add HDD data
        if(isset($_POST["hdd_make"]) && isset($_POST["hdd_serial_no"]) && isset($_POST["hdd_purchase_date"]) && isset($_POST["hdd_warranty"]) && isset($_POST["hdd_ex_date"])) {
            
            $device_category = "hdd";
            $hdd_make = $_POST["hdd_make"];
            $hdd_serial_no = $_POST["hdd_serial_no"];
            $ch = "";
            $hdd_purchase_date = $_POST["hdd_purchase_date"];
            $hdd_warranty = $_POST["hdd_warranty"];
            $hdd_ex_date = $_POST["hdd_ex_date"];
            $status = 1;
    
            $result_hdd = $dbOperation->addDevice($device_category, $hdd_make, $hdd_serial_no, $ch, $hdd_purchase_date, $depot, $category, $hdd_warranty, $hdd_ex_date,$status);
            
            if($result_hdd == "DEVICE_ADDED"){
                $device_status = true;
            }else{
                $device_status = false;
            }
        }

        if($device_status){
            $response =  "DEVICE_ADDED";
        }else{
            $response = "ERROR";
        }

        echo json_encode($response);
        
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
    $child_name =  strtoupper   ($_POST['child_name']);
    $parentCategory =$_POST['parent_category'];

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


    
// $opr = new DBoperation();
// echo $opr->addDevice("nvr",1,"demo",5778, 4,2005-02-20,"mehsana","depot1",5,2005-02-20,1);

?>

