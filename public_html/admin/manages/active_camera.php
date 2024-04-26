<?php

include("../database/constant.php");
include("../database/db.php");

$db = new Database();
$con = $db->connect();


$id = $_GET['id'];
$status = $_GET['status'];
$updateQuery1 = "UPDATE camera_collection SET status = $status WHERE camera_id = $id";
mysqli_query($con,$updateQuery1);

header('location:camera_manage.php');


?>