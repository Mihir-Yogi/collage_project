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
        <?php include_once("header.php"); ?>


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
<table class="table" id="data_table">
<br>
<thead>
    <tr>
    <th scope="col">Device category</th>
    <th scope="col">section</th>
    <th scope="col">depot</th>
    <th scope="col">category</th>
    <th scope="col">make</th>
    <th scope="col">serial no</th>
    <th scope="col">purchase date</th>
    <th scope="col">expiry date</th>
    <th scope="col">insert date</th>
    </tr>
</thead>
<tbody>

    <?php 
        include_once("../database/db.php"); 

        
        $database = new Database();
        
        
        $con = $database->connect();
        
        // Check if the connection was successful
        if ($con === "DATABASE_CONNECTION_FAIL") {
            die("Database connection failed.");
        }

    if(!isset($_POST['submit'])){
        $getQuery = "SELECT device_collection.device_id, device_collection.device_category, device_collection.section, category.category_name, child_category.child_name, device_collection.make, device_collection.serial_no, device_collection.purchase_date, device_collection.expiery_date, device_collection.ins_date,device_collection.status FROM device_collection  JOIN category ON category.pid = device_collection.depot JOIN child_category ON child_category.cid = device_collection.category WHERE category.pid = device_collection.category AND child_category.cid = device_collection.category";
        getData($getQuery);

    }else if(isset($_POST['submit']) && isset($_POST['combo_d_cat']) && isset($_POST['combo_c_depot'])){
        $depot = $_POST['combo_d_cat'];
        $category = $_POST['combo_c_depot']; 

        $getQuery = "SELECT device_collection.device_id, 
                    device_collection.device_category, 
                    device_collection.section, 
                    category.category_name, 
                    child_category.child_name, 
                    device_collection.make, 
                    device_collection.serial_no, 
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
    include_once("../database/db.php");

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
            if($row['status']==1){
            echo '<tr>';
            echo '<td>'.$row['device_category'].'</td>';
            echo '<td>'.$row['section'].'</td>';
            echo '<td>'.$row['category_name'].'</td>';
            echo '<td>'.$row['child_name'].'</td>';
            echo '<td>'.$row['make'].'</td>';
            echo '<td>'.$row['serial_no'].'</td>';
            echo '<td>'.$row['purchase_date'].'</td>';
            echo '<td>'.$row['expiery_date'].'</td>';
            echo '<td>'.$row['ins_date'].'</td>';
            echo '<td>';
            echo '<p>  <a href="#" class="btn btn-success">ON</a>  </p>';'</td>';
            
            echo ' <tr>';
        } }
    } else {
        echo "No records found.";
    }
}

?>
</tbody>
</table>
</div>
<div class="container-fluid" style="width: 70%;">

        <?php include_once("../pages/new_dvr.php")?>
        <?php include_once("../pages/new_nvr.php")?>
        <?php include_once("../pages/new_hdd.php")?>
</div>


</body>
<script src="../js/main.js"></script>
<script src="../js/active.js"></script>


</html>
