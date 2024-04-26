<?php 
include_once("../database/constant.php");
include_once("../includes/user.php");
include_once("../database/db.php");
include_once("../includes/DBoperation.php");


//new nvr

if(isset($_POST["active_n_d"]) && isset($_POST["active_n_c"]) && isset($_POST["new_nvr_make"]) && isset($_POST["new_nvr_serial_no"]) && isset($_POST["new_nvr_purchase_date"]) && isset($_POST["new_nvr_warranty"]) && isset($_POST["new_nvr_ex_date"])) {

    $dbOperation = new DBoperation();

    $depot = $_POST["active_n_d"];
    $category = $_POST["active_n_c"];
    $device_category = "nvr";
    $make = $_POST["new_nvr_make"];
    $serial_no = $_POST["new_nvr_serial_no"];
    $purchase_date = $_POST["new_nvr_purchase_date"];
    $warranty = $_POST["new_nvr_warranty"];
    $ex_date = $_POST["new_nvr_ex_date"];
    $status = 1;

    
    $result = $dbOperation->addNewDevice($device_category,$make,$serial_no,$purchase_date,$depot,$category,$warranty,$ex_date,$status);
    
    echo $result;
    }

// new dvr

if(isset($_POST["active_d_d"]) && isset($_POST["active_d_c"]) && isset($_POST["new_dvr_make"]) && isset($_POST["new_dvr_serial_no"]) && isset($_POST["new_dvr_purchase_date"]) && isset($_POST["new_dvr_warranty"]) && isset($_POST["new_dvr_ex_date"])) {

    $dbOperation = new DBoperation();

    $depot = $_POST["active_d_d"];
    $category = $_POST["active_d_c"];
    $device_category = "dvr";
    $make = $_POST["new_dvr_make"];
    $serial_no = $_POST["new_dvr_serial_no"];
    $purchase_date = $_POST["new_dvr_purchase_date"];
    $warranty = $_POST["new_dvr_warranty"];
    $ex_date = $_POST["new_dvr_ex_date"];
    $status = 1;

    
    $result = $dbOperation->addNewDevice($device_category,$make,$serial_no,$purchase_date,$depot,$category,$warranty,$ex_date,$status);
    
    echo $result;
    }

//new hdd

if(isset($_POST["active_h_d"]) && isset($_POST["active_h_c"]) && isset($_POST["new_hdd_make"]) && isset($_POST["new_hdd_serial_no"]) && isset($_POST["new_hdd_purchase_date"]) && isset($_POST["new_hdd_warranty"]) && isset($_POST["new_hdd_ex_date"])) {

    $dbOperation = new DBoperation();

    $depot = $_POST["active_h_d"];
    $category = $_POST["active_h_c"];
    $device_category = "hdd";
    
    $make = $_POST["new_hdd_make"];
    $serial_no = $_POST["new_hdd_serial_no"];
    $purchase_date = $_POST["new_hdd_purchase_date"];
    $warranty = $_POST["new_hdd_warranty"];
    $ex_date = $_POST["new_hdd_ex_date"];
    $status = 1;

    
    $result = $dbOperation->addNewDevice($device_category,$make,$serial_no,$purchase_date,$depot,$category,$warranty,$ex_date,$status);
    
    echo $result;
    }
?>