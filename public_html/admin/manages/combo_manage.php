<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location:../index.php"); 
        exit();
    }

    if (isset($_SESSION['user_type'])) {    
        if ($_SESSION["user_type"] == "Admin") {

        } else if ($_SESSION["user_type"] == "other") {
            header("Location: ../../user_dashboard.php");
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

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        .wave{
        position: fixed;
        bottom: 0;
        width: 100%;
        z-index: -1;
        }
    </style>
</head>
<body>
        <!-- Navbar -->
        <?php include_once("../header.php"); ?>



<div>

<svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#0099ff" fill-opacity="1" d="M0,64L60,69.3C120,75,240,85,360,117.3C480,149,600,203,720,213.3C840,224,960,192,1080,170.7C1200,149,1320,139,1380,133.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
</svg>

</div>
        <br>
<div class="container-fluid" style="width: 70%;">

<form method="post" class="form-horizontal">
<div class="dropdown">
    <div class="row">
        <div class="col-md-5">
                <label for="depot">Depot</label>
                <select name="combo_d_cat" class="form-control" id="combo_d_cat">
                    <option value="">Select depot</option>
                </select>
        </div>
        <div class="col-md-5">
                <label for="child depot">category</label>
                <select name="combo_c_depot" class="form-control" id="combo_c_depot">
                    <option value=""></option>
                </select>
        </div>

        <div class="col-md-2">
            <label></label>
            <input type="submit" name="submit" class="btn btn-primary mt-4" id="submit" value="submit">
        </div>
    </div>
</div>
</form>
<table class="display nowrap" style="width:100%" id="data_table">
<br>
<thead>
    <tr>
    <th scope="col">Device category</th>
    <th scope="col">Depot</th>
    <th scope="col">Location</th>
    <th scope="col">make</th>
    <th scope="col">serial no</th>
    <th scope="col">CH</th>
    <th scope="col">purchase date</th>
    <th scope="col">expiry date</th>
    <th scope="col">insert date</th>
    <th scope="col">status</th>
    <th scope="col">Status</th>
    </tr>
</thead>
<tbody>

    <?php 
        include_once("../../database/db.php"); 

        $city = ("#combo_d_cat");
        $depot = ("#combo_c_depot");
        
        $database = new Database();
        $con = $database->connect();
        
        // Check if the connection was successful
        if ($con === "DATABASE_CONNECTION_FAIL") {
            die("Database connection failed.");
        }


    if(!isset($_POST['submit'])){
        $getQuery = "SELECT 
        device_collection.device_id, 
        device_collection.device_category, 
        category.category_name, 
        child_category.child_name, 
        device_collection.make, 
        device_collection.serial_no, 
        device_collection.ch, 
        device_collection.purchase_date, 
        device_collection.expiery_date, 
        device_collection.ins_date,
        device_collection.status 
        FROM device_collection  
        JOIN category ON category.pid = device_collection.depot 
        JOIN child_category ON child_category.cid = device_collection.category 
        WHERE category.pid = device_collection.category AND child_category.cid = device_collection.category";
        getData($getQuery);

    }else if(isset($_POST['submit']) && isset($_POST['combo_d_cat']) && isset($_POST['combo_c_depot'])){
        $depot = $_POST['combo_d_cat'];
        $category = $_POST['combo_c_depot']; 

        $getQuery = "SELECT device_collection.device_id, 
                    device_collection.device_category, 
                    category.category_name, 
                    child_category.child_name, 
                    device_collection.make, 
                    device_collection.serial_no, 
                    device_collection.ch, 
                    device_collection.purchase_date, 
                    device_collection.expiery_date, 
                    device_collection.ins_date,
                    device_collection.status 
            FROM device_collection 
            JOIN category ON category.pid = device_collection.depot 
            JOIN child_category ON child_category.cid = device_collection.category 
            WHERE category.pid = $depot AND child_category.cid = $category";

        getData($getQuery);

    }
    ?>
    <?php 
function getData($sql){
    include_once("../../database/db.php");

    $database = new Database();
    $con = $database->connect();
    

    if ($con === "DATABASE_CONNECTION_FAIL") {
        die("Database connection failed.");
    }

    $result = mysqli_query($con, $sql);

    if (!$result) {
        die('Error: ' . mysqli_error($con));
        }

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {

        // Fetch and display results
        
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>'.$row['device_category'].'</td>';
            echo '<td>'.$row['category_name'].'</td>';
            echo '<td>'.$row['child_name'].'</td>';
            echo '<td>'.$row['make'].'</td>';
            echo '<td>'.$row['serial_no'].'</td>';
            echo '<td>'.$row['ch'].'</td>';
            echo '<td>'.$row['purchase_date'].'</td>';
            echo '<td>'.$row['expiery_date'].'</td>';
            echo '<td>'.$row['ins_date'].'</td>';
            echo '<td>';if ($row['status'] == 1) {
                    echo '<p>  <a href="active.php?id='.$row['device_id'].'&status=0" class="btn btn-success">Active</a>  </p>';
                } else {
                    echo '<p>  <a href="active.php?id='.$row['device_id'].'&status=1" class="btn btn-danger">Deactive</a>  </p>';
                }
            '</td>';
            echo '<td>';if ($row['status'] == 0) {
                    echo '<p>  <a href="#" class="btn btn-primary replace-btn">Replace</a>   </p>';
                }'</td>';
            echo ' <tr>';
        }
    } else {
        echo "No records found.";
    }
}

?>
</tbody>
</table>
</div>
<div class="container-fluid" style="width: 70%;">

        <?php include_once("../new_dvr.php")?>
        <?php include_once("../new_nvr.php")?>
        <?php include_once("../new_hdd.php")?>
</div>


</body>
<script src="../../js/main.js"></script>
<script src="../../js/active.js"></script>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
<script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.4/js/dataTables.foundation.js"></script>

<script>
    $(document).ready(function() {
        new DataTable('#data_table', {
        pagingType: 'simple_numbers'
        });
    })
</script>
</html>
