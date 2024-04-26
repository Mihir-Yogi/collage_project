
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white " href="#">CIM System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-white "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php 
        // Check if the current page is not user_dashboard
        if(basename($_SERVER['PHP_SELF']) !== 'index.php') {
        ?>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="../index.php">Home</a>
        </li>
        <?php
        }
        ?>

        <?php 
        if(isset($_SESSION["username"])){
        ?>
          <li class="nav-item">
          <a class="nav-link active text-white " href="../logout.php">Log out</a>
          </li>
        <?php
        }else{

        }
        ?>

      </ul>
    </div>
  </div>
</nav>