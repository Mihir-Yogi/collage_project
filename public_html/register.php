<!DOCTYPE html>
<html lang="en">
<head>
    <title>CIM management system</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"     integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/loader.css">
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

        <!-- Navigation -->
        <?php include_once("./pages/user_header.php"); ?>

<div class="container">
        <div class="card mx-auto mt-5" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title">Register</h5>
                <br>
            <form id="register_form" onsubmit="return false" autocomplete="off" >
            <div class="mb-3 row">  
            <div class="col-md-6">
                <div class="wave-group">
                    <input required="" type="text" name="username" id="username" class="input">
                        <span class="bar"></span>
                    <label class="label">
                        <span class="label-char" style="--index: 0">N</span>
                        <span class="label-char" style="--index: 1">a</span>
                        <span class="label-char" style="--index: 2">m</span>
                        <span class="label-char" style="--index: 3">e</span>
                    </label>
                    <small id=e_error" class="form-text text_muted"></small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="wave-group">
                    <input required="" type="email" name="email" id="email" class="input">
                        <span class="bar"></span>
                    <label class="label">
                        <span class="label-char" style="--index: 0">E</span>
                        <span class="label-char" style="--index: 1">m</span>
                        <span class="label-char" style="--index: 2">a</span>
                        <span class="label-char" style="--index: 3">i</span>
                        <span class="label-char" style="--index: 3">l</span>
                    </label>
                    <small id=e_error" class="form-text text_muted"></small>
                </div>
            </div>


            

            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <div class="wave-group">
                        <input required="" type="password" name="password1" id="password1" class="input">
                            <span class="bar"></span>
                        <label class="label">
                            <span class="label-char" style="--index: 0">p</span>
                            <span class="label-char" style="--index: 1">a</span>
                            <span class="label-char" style="--index: 2">s</span>
                            <span class="label-char" style="--index: 3">s</span>
                            <span class="label-char" style="--index: 3">w</span>
                            <span class="label-char" style="--index: 3">o</span>
                            <span class="label-char" style="--index: 3">r</span>
                            <span class="label-char" style="--index: 3">d</span>
                        </label>
                        <small id=p1_error" class="form-text text_muted"></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wave-group">
                        <input required="" type="password" name="password2" id="password2" class="input">
                            <span class="bar"></span>
                        <label class="label">
                            <span class="label-char" style="--index: 0">c</span>
                            <span class="label-char" style="--index: 0">o</span>
                            <span class="label-char" style="--index: 0">n</span>
                            <span class="label-char" style="--index: 0">f</span>
                            <span class="label-char" style="--index: 0">o</span>
                            <span class="label-char" style="--index: 0">r</span>
                            <span class="label-char" style="--index: 0">m</span>
                            <span class="label-char" style="--index: 0">&nbsp;</span>
                            <span class="label-char" style="--index: 0">p</span>
                            <span class="label-char" style="--index: 1">a</span>
                            <span class="label-char" style="--index: 2">s</span>
                            <span class="label-char" style="--index: 3">s</span>
                            <span class="label-char" style="--index: 3">w</span>
                            <span class="label-char" style="--index: 3">o</span>
                            <span class="label-char" style="--index: 3">r</span>
                            <span class="label-char" style="--index: 3">d</span>
                        </label>
                        <small id=p2_error" class="form-text text_muted"></small>
                    </div>
                </div>
            </div>

                <div class="form-group">
                    <label for="usertype">Usertype</label>
                    <select name="usertype" id="usertype" class="form-control">
                        <option value="">Choose Usertype</option>
                        <option value="Admin">Admin</option>
                        <option value="other">other</option>
                    </select>
                    <small id="t_error" class="form-text text-muted"></small>
                </div>
                <br>
                <button class="btn btn-primary" name="user_register" type="submit">Register </button>

                <span><a href="index.php">Login</a></span>
            </form>
            </div>
        </div>
</div>
</body>
<script src="./js/main.js"></script>
</html>
