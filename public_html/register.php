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
        <!-- Navigation -->
        <?php include_once("./pages/header.php"); ?>

<div class="container">
        <div class="card mx-auto mt-5" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title">Register</h5>
                <br>
            <form id="register_form" onsubmit="return false" autocomplete="off" >
            <div class="mb-3 row">  
                <div class="col-md-6">
                    <label for="username">Full name</label>
                    <input type="text" name="username" class="form-control" id="username">
                    <small id="u_error" class="form-text"></small>
                </div>
                <div class="col-md-6">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <small id="e_error" class="form-text text-muted"></small>
                </div>

            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="password">Password</label>
                    <input type="password" name="password1" class="form-control" id="password1">
                    <small id="p1_error" class="form-text text-muted"></small>
                </div>
                <div class="col-md-6">
                <label for="password">Conform Password</label>
                    <input type="password" name="password2" class="form-control" id="password2">
                    <small id="p2_error" class="form-text text-muted"></small>
                </div>
            </div>

                <div class="form-group">
                    <label for="usertype">Usertype</label>
                    <select name="usertype" id="usertype" class="form-control">
                        <option value="">Choose Usertype</option>
                        <option value="1">Admin</option>
                        <option value="0">Other</option>
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