<?php

include_once("./database/constant.php");
if(isset($_SESSION["userid"])){
    session_destroy();
}
header("location:".DOMAIN."/");


?>