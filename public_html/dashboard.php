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
</head>
<body>
        <!-- Navbar -->
        <?php include_once("./pages/header.php"); ?>


        <br>
<div class="container">
    <div class="row">
        <div class="col-md-4"  >
            <div class="card mx-auto" style="width: 18rem; height: 100;">
                <div class="card-body">
                    <h5 class="card-title">Profile Info</h5>
                    <p class="card-text">Mihir Yogi</p>
                    <p class="card-text">Admin</p>
                    <p class="card-text">Last Login : xxxx-xx-xx </p>
                    <a href="#" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
            <br>
            <div class="card mx-auto" style="width: 18rem; height: 100;">
                <div class="card-body">
                    <h5 class="card-title">Profile Info</h5>
                    <p class="card-text">Mihir Yogi</p>
                    <p class="card-text">Admin</p>
                    <p class="card-text">Last Login : xxxx-xx-xx </p>
                    <a href="#" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div style="
            width: 100%; 
            height: 100%; 
            background-color: #e3f2fd;
            padding-left: 10px;
            " >
            <h1>Welcome Admin</h1>
                <div class="row">
                    <div class="col-sm-6">
                    <iframe src="https://free.timeanddate.com/clock/i9a19ov3/n423/fn5/fs19/tct/pct/bat1/bace3f2fd/pa4/tt0/tw0/tm1/ts1/tb4" frameborder="0" width="116" height="53" allowtransparency="true"></iframe>
                    </div>
                    <div class="col-sm-6">
                        <div class="card m-2">
                            <div class="card-body">
                                <h5 class="card-title">NVR</h5>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nvr">Add</a>
                                <a href="#" class="btn btn-primary">Manage</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        
                    </div>
                    <div class="col-sm-6">
                        <div class="card m-2">
                            <div class="card-body">
                                <h5 class="card-title">DVR</h5>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dvr">Add</a>
                                <a href="#" class="btn btn-primary">Manage</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        
                    </div>
                    <div class="col-sm-6">
                        <div class="card m-2 mb-5">
                            <div class="card-body">
                                <h5 class="card-title">HDD</h5>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hdd">Add</a>
                                <a href="#" class="btn btn-primary">Manage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    


        <!-- nvr_model import -->
        <?php include_once("./pages/nvr_add.php"); ?>

        <!-- nvr_model import -->
        <?php include_once("./pages/dvr_add.php"); ?>

        <!-- nvr_model import -->
        <?php include_once("./pages/hdd_add.php"); ?>

</body>
</html>
