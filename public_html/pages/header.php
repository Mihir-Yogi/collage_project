<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMERA MANAGEMENT SYSTEM</title>

    <!-- font font-awesome cdn -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- scripts jquery -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- scripts bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q     +zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- bootstrap cdn -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- custom script -->
    <link rel="stylesheet" href="../css/nav.css">
    

</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-black px-2">
        <div class="side-nav-button p-2 me-2 text-light">
        </div>

        <a class="navbar-brand px-4" href="#">CIMS</a>

        <div class="navbar-collapse">
            <ul class="navbar-nav me-auto">

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                        menu-1
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a href="#" class="dropdown-item">CHILD-1</a></li>
                        <li><a href="#" class="dropdown-item">CHILD-2</a></li>
                        <li><a href="#" class="dropdown-item">CHILD-3</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <form class="d-flex me-5">
            <input type="search" class="form-control me-2" placeholder="search">
            <button class="btn btn-outline-light" type="submit">search</button>
        </form>
        
        <div class="profile-logo dropstart">
            <button class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">
                User
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a href="#" class="dropdown-item">sign up</a></li>
                <li><a href="#" class="dropdown-item">login</a></li>
                <li><a href="profile.php" class="dropdown-item">your profile</a></li>
                <li><a href="#" class="dropdown-item">log out</a></li>
            </ul>
        </div>


    </nav>

    <main>
        <div class="app-side-nav black-border">
            <div class="side-nav-content">

                <ul class="nav-list ">
                    <a href="#">
                    <li class="nav-list-item "> 
                        <i class="fa-solid fa-camera"></i>
                        <span>
                            Camera
                        </span>
                        
                    </li>
                    </a>
                    <a href="#">
                    <li class="nav-list-item">
                        <i class="fa-solid fa-hard-drive"></i>
                        <span>
                            NVR
                        </span>
                    </li>
                    </a>
                    <a href="#">
                    <li class="nav-list-item">
                        <i class="fa-solid fa-compact-disc"></i>
                        <span>
                            DVR
                        </span>
                    </li>
                    </a>
                </ul>

            </div>
        </div>

        <div class="display-area">
            <h1>main display area   </h1>
        </div>
    </main>

</body>
<script src="js/main.js" ></script>
</html>