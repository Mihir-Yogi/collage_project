<?php 
    include_once("database/constant.php");
    if(isset($_SESSION["userid"])){
        header("location:".DOMAIN."/dashboard.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CIMS management system</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"     integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/loader.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<!-- loader -->

<div class="overlay">
<div id="inner_loader">
    <div class="loader">
        <div class="loader-inner">
            <div class="loader-block"></div>
            <div class="loader-block"></div>
            <div class="loader-block"></div>
            <div class="loader-block"></div>
            <div class="loader-block"></div>
            <div class="loader-block"></div>
            <div class="loader-block"></div>
            <div class="loader-block"></div>
        </div>
    </div>
</div>
</div>
        <!-- navigation --> 
        <?php include_once("./pages/header.php"); ?>
        
<div class="container">

    <?php 
    if(isset($_GET["msg"]) AND !empty($_GET["msg"])){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_GET["msg"]; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
    }
    ?>


        <div class="card mx-auto mt-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Login</h5>
            <form id="form_login" onsubmit="return false"  >

                <div class="mb-3">
                    <label for="email" >Email address</label>
                    <input type="email" class="form-control" id="log_email" name="log_email">
                    <small id="e_error" class="form-text text_muted"></small>
                </div>
                <div class="mb-3">
                    <label for="password" >Password</label>
                    <input type="password" class="form-control" name="log_password" id="log_password">
                    <small id="p_error" class="form-text text_muted"></small>
                </div>
                <button class="btn btn-primary" name="user_login" type="submit">Login </button>

                <span><a href="register.php">Register</a></span>
            </form>
            </div>
            <div class="card-footer"><a href="
            #">Forget Password</a></div>
        </div>
</div>
</body>
<script src="./js/main.js"></script>
</html>