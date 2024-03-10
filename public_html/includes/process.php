<?php 

include_once("../database/constant.php");
include_once("../includes/user.php");

if(isset($_POST["username"]) AND isset($_POST["email"])){
    $user = new User();
    echo $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
}

// $user = new User();
// echo $user->createUserAccount("Test5","test5@gmail.com","1234567890","Admin");

?>