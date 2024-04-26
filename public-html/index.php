<?php 

session_start();

if (isset($_SESSION['user_type'])) {    
    if ($_SESSION["user_type"] == "Admin") {
        header("Location: admin/index.php");
        exit();
    } else if ($_SESSION["user_type"] == "other") {
        header("Location: user_dashboard.php");
        exit();
    }
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

    <link rel="stylesheet" href="css/login.css">
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
        <?php include_once("admin/header.php"); ?>
        
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


        <div class="card mx-auto " style="width: 18rem; margin-top: 10%;">
            <div class="card-body">
                <h2 class="card-title">Login</h2>
                <br>
            <form id="form_login" method="POST" onsubmit="return false"  >


            <div class="mb-3">
                <div class="wave-group">
                    <input required="" type="email" name="log_email" id="log_email" type="text" class="input">
                        <span class="bar"></span>
                    <label class="label">
                        <span class="label-char" style="--index: 0">E</span>
                        <span class="label-char" style="--index: 1">m</span>
                        <span class="label-char" style="--index: 2">a</span>
                        <span class="label-char" style="--index: 3">i</span>
                        <span class="label-char" style="--index: 4">l</span>
                    </label>
                    <small id=e_error" class="form-text text_muted"></small>
                </div>
            </div>

            <div class="mb-3">
                <div class="wave-group">
                    <input required="" type="password" name="log_password" id="log_password" class="input">
                        <span class="bar"></span>
                    <label class="label">
                        <span class="label-char" style="--index: 0">p</span>
                        <span class="label-char" style="--index: 1">a</span>
                        <span class="label-char" style="--index: 2">s</span>
                        <span class="label-char" style="--index: 3">s</span>
                        <span class="label-char" style="--index: 4">w</span>
                        <span class="label-char" style="--index: 6">o</span>
                        <span class="label-char" style="--index: 7">r</span>
                        <span class="label-char" style="--index: 8">d</span>
                    </label>
                    <small id="p_error" class="form-text text_muted"></small>
                </div>
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