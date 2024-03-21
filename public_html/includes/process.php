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

//add camera 

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

// if (isset($response)) {

    $response = array();

//add combo
    if(isset($_POST["combo_d_cat"]) && isset($_POST["combo_c_depot"]) && isset($_POST["combo_section"])) {
        $depot = $_POST["combo_d_cat"];
        $category = $_POST["combo_c_depot"];
        $section = $_POST["combo_section"];
    
        $dbOperation = new DBoperation();
    
        // Add NVR data
        if(isset($_POST["nvr_make"]) && isset($_POST["nvr_serial_no"]) && isset($_POST["nvr_purchase_date"]) && isset($_POST["nvr_warranty"]) && isset($_POST["nvr_ex_date"])) {
            $nvr_make = $_POST["nvr_make"];
            $nvr_serial_no = $_POST["nvr_serial_no"];
            $nvr_purchase_date = $_POST["nvr_purchase_date"];
            $nvr_warranty = $_POST["nvr_warranty"];
            $nvr_ex_date = $_POST["nvr_ex_date"];
    
            $result_nvr = $dbOperation->addNvr($section, $nvr_make, $nvr_serial_no, $nvr_purchase_date, $depot, $category, $nvr_warranty, $nvr_ex_date);
            $response['nvr_result'] = $result_nvr;
        }
    
        // Add DVR data
        if(isset($_POST["dvr_make"]) && isset($_POST["dvr_serial_no"]) && isset($_POST["dvr_purchase_date"]) && isset($_POST["dvr_warranty"]) && isset($_POST["dvr_ex_date"])) {
            $dvr_make = $_POST["dvr_make"];
            $dvr_serial_no = $_POST["dvr_serial_no"];
            $dvr_purchase_date = $_POST["dvr_purchase_date"];
            $dvr_warranty = $_POST["dvr_warranty"];
            $dvr_ex_date = $_POST["dvr_ex_date"];
    
            $result_dvr = $dbOperation->addDvr($section, $dvr_make, $dvr_serial_no, $dvr_purchase_date, $depot, $category, $dvr_warranty, $dvr_ex_date);
            $response['dvr_result'] = $result_dvr;
        }
    
        // Add HDD data
        if(isset($_POST["hdd_make"]) && isset($_POST["hdd_serial_no"]) && isset($_POST["hdd_purchase_date"]) && isset($_POST["hdd_warranty"]) && isset($_POST["hdd_ex_date"])) {
            $hdd_make = $_POST["hdd_make"];
            $hdd_serial_no = $_POST["hdd_serial_no"];
            $hdd_purchase_date = $_POST["hdd_purchase_date"];
            $hdd_warranty = $_POST["hdd_warranty"];
            $hdd_ex_date = $_POST["hdd_ex_date"];
    
            $result_hdd = $dbOperation->addHdd($section, $hdd_make, $hdd_serial_no, $hdd_purchase_date, $depot, $category, $hdd_warranty, $hdd_ex_date);
            $response['hdd_result'] = $result_hdd;
        }
        echo json_encode($response);
    }


// }
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


// Check if depot, category, and section are set in the POST request
if(isset($_POST["combo_d_cat"]) && isset($_POST["combo_c_depot"]) && isset($_POST["combo_section"])) {
    // Retrieve depot, category, and section from POST data
    $depot = $_POST["combo_d_cat"];
    $category = $_POST["combo_c_cat"];
    $section = $_POST["combo_section"];

    // Create an instance of DBoperation class
    $dbOperation = new DBoperation();

    // Fetch NVR data based on depot, category, and section
    $nvrData = $dbOperation->fetchNvrData($depot, $category, $section);

    // Fetch DVR data based on depot, category, and section
    $dvrData = $dbOperation->fetchDvrData($depot, $category, $section);

    // Fetch HDD data based on depot, category, and section
    $hddData = $dbOperation->fetchHddData($depot, $category, $section);

    // Combine all fetched data into a single array
    $responseData = array(
        "nvrData" => $nvrData,
        "dvrData" => $dvrData,
        "hddData" => $hddData
    );

    // Send JSON response with the combined data
    echo json_encode($responseData);
} else {
    // Send JSON response with an error message if depot, category, or section is not set in the POST request
    echo json_encode(["error" => "Depot, category, and section must be provided"]);
}
?>