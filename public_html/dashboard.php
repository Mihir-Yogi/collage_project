<?php
include_once("./database/constant.php");
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
        <!-- Navbar -->
        <?php include_once("./pages/header.php"); ?>


        <br>
<div class="container mt-3" >
    <div class="row">
        <div class="col-md-4"  >
            <div class="card mx-auto" style="width: 18rem; height: 100; background-color: #e3f2fd;">
                <div class="card-body">
                    <h5 class="card-title">Profile Info</h5>
                    <p class="card-text">Mihir Yogi</p>
                    <p class="card-text">Admin</p>
                    <p class="card-text">Last Login : xxxx-xx-xx </p>
                    <a href="#" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>

            <div class="card mx-auto mt-1" style="width: 18rem; height: 100; background-color: #e3f2fd;">
                <div class="card-body">
                    <h5 class="card-title">Items count</h5>
                    <p class="card-text">camera : 3</p>
                    <p class="card-text">nvr : 3</p>
                    <p class="card-text">dvr : 3 </p>
                    <p class="card-text">hdd : 3 </p>
                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div class="card b-card" style="
            width: 100%; 
            height: 100%; 
            background-color: #e3f2fd;
            " >
            <div class="clock mb-4">
                <div style="margin-left: 5px;">
                    <h1>Welcome Admin</h1>
                </div>
                <div class="mt-3">
                    <iframe src="https://free.timeanddate.com/clock/i9a3avns/n2027/fs20/tct/pct/ftb/pd2/ts1" frameborder="0" width="108" height="25" allowtransparency="true"></iframe>
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card card-a-m m-2">
                            <div class="card-body">
                                <h5 class="card-title">CAMERA</h5>
                                <small>Here you can add and manage CAMERA</small>
                                <div class="mt-2">
                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#camera">Add</a>
                                <a href="#" class="btn btn-primary">Manage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card card-a-m m-2">
                            <div class="card-body">
                                <h5 class="card-title">NVR/DVR/HDD</h5>
                                <small>Here you can add and manage NVR/DVR AND HDD</small>
                                <div class="mt-2">
                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#combo">Add</a>
                                <a href="pages/combo_manage.php" class="btn btn-primary">Manage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card card-a-m m-2">
                            <div class="card-body ">
                                <h5 class="card-title">CATEGORY</h5>
                                <small>Here you can add and manage depot category</small>
                                <br>
                                <div class="mt-2">
                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#child_category">Add</a>
                                <a href="#" class="btn btn-primary">Manage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card card-a-m m-2">
                            <div class="card-body">
                                <h5 class="card-title">PARENT</h5>
                                <small>Here you can add and manage PARENT</small>
                                <div class="mt-2">
                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#parent">Add</a>
                                <a href="#" class="btn btn-primary">Manage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
        <!-- camera_import -->
        <?php include_once("./pages/camera_add.php"); ?>

        <!-- camera_model import -->
        <?php include_once("./pages/parent_add.php"); ?>

        <!-- combo_model import -->
        <?php include_once("./pages/combo_add.php"); ?>

        <!-- category_import -->
        <?php include_once("./pages/child_add.php"); ?>



</body>
<script src="js/main.js"></script>

</html>
