<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location:../index.php"); 
        exit();
    }

    if (isset($_SESSION['user_type'])) {    
        if ($_SESSION["user_type"] == "Admin") {
            header("Location: ../admin/index.php");
            exit();
        } else if ($_SESSION["user_type"] == "other") {

        }
    }

    include_once("../database/db.php"); 

    $database = new Database();
    $con = $database->connect();
    $cityQuery = "SELECT * FROM category";
    $cityResult = mysqli_query($con, $cityQuery) or die(mysqli_error($con));

    $depotQuery = "SELECT * FROM child_category";
    $depotResult = mysqli_query($con, $depotQuery) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CIMS management system</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
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
<?php include_once("user_header.php"); ?>
<div>   
<svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#0099ff" fill-opacity="1" d="M0,0L48,32C96,64,192,128,288,170.7C384,213,480,235,576,234.7C672,235,768,213,864,192C960,171,1056,149,1152,133.3C1248,117,1344,107,1392,101.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>

</div>
<br>
<div class="container" style="width: 100%;">
<form method="post" class="form-horizontal" id="active_form">
        <div class="dropdown">
            <div class="row">
                <div class="col-md-3">
                    <label for="city">Depot</label>
                    <select name="camera_d_cat" class="form-control" id="camera_d_cat">
                        <option value="">Select Depot</option>
                        <!-- Populate options dynamically if needed -->
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="depot">Location</label>
                    <select name="camera_c_depot" class="form-control" id="camera_c_depot">
                        <option value="">Select Location</option>
                        <!-- Populate options dynamically based on selected city if needed -->
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" id="start_date">
                </div>
                <div class="col-md-3">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" id="end_date">
                </div>
                <div class="col-md-12 mt-3">
                    <input type="submit" name="submit_dates" class="btn btn-primary" id="submit_dates" value="Submit">
                </div>
            </div>
        </div>
    </form>
    
    <table id="data_table" class="display nowrap" style="width:100%">
        <br>
        <thead>
        <tr>
            <th scope="col">device</th>
            <th scope="col">Depot</th>
            <th scope="col">Location</th>
            <th scope="col">Camera Location</th>
            <th scope="col">make</th>
            <th scope="col">serial no</th>
            <th scope="col">megapixel</th>
            <th scope="col">purchase</th>
            <th scope="col">expiry</th>
            <th scope="col">insert</th>
            <th scope="col">status</th>
            <th scope="col">remark</th>
        </tr>
        </thead>
        <tbody>
        <?php
include_once("../database/db.php");

$database = new Database();
$con = $database->connect();

// Check if the connection was successful
if (isset($_POST['submit_dates'])) {
    $city = $_POST['camera_d_cat'];
    $depot = $_POST['camera_c_depot'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if (empty($start_date) || empty($end_date)) {
        echo "<p>Please select both Start Date and End Date.</p>";
    } else {
        if (empty($city) || empty($depot)) {
            echo "<p>Please select both City and Depot.</p>";
        } else {
            // Construct the SQL query
            $selectedCityId = mysqli_real_escape_string($con, $city);
            $selectedDepotId = mysqli_real_escape_string($con, $depot);

            $cityNameQuery = "SELECT category_name FROM category WHERE pid = $selectedCityId";
            $cityNameResult = mysqli_query($con, $cityNameQuery);
            if ($cityNameResult === false) {
                die("Error in city query: " . mysqli_error($con));
            }
            $cityNameRow = mysqli_fetch_assoc($cityNameResult);

            $depotNameQuery = "SELECT child_name FROM child_category WHERE cid = $selectedDepotId";
            $depotNameResult = mysqli_query($con, $depotNameQuery);
            if ($depotNameResult === false) {
                die("Error in depot query: " . mysqli_error($con));
            }
            $depotNameRow = mysqli_fetch_assoc($depotNameResult);

            $city = $cityNameRow['category_name'];
            $depot = $depotNameRow['child_name'];
            
            // Construct and execute the main SQL query
            $sql = "SELECT 
                        camera_status.status_id, 
                        camera_status.device_category,  
                        camera_status.city, 
                        camera_status.depot, 
                        camera_status.location, 
                        camera_status.make, 
                        camera_status.serial_no, 
                        camera_status.megapixel, 
                        camera_status.purchase_date, 
                        camera_status.expiry_date, 
                        camera_status.ins_date, 
                        camera_status.status, 
                        camera_status.remark 
                    FROM camera_status 
                    WHERE 1"; // Start building the query

            if (!empty($city)) {
                $sql .= " AND camera_status.city = '$city'";
            }

            if (!empty($depot)) {
                $sql .= " AND camera_status.depot = '$depot'";
            }

            // Add condition for date range
            $sql .= " AND camera_status.submit_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'";

            // Call the getData function with the constructed SQL query
            getData($con, $sql);
        }
    }
}

        function getData($con, $sql) {
            $result = mysqli_query($con, $sql);

            if (!$result) {
                die('Error: ' . mysqli_error($con));
            }
            
// Initialize counters
$onDevicesCount = 0;
$offDevicesCount = 0;
            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Fetch and display results
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['device_category'] . '</td>';
                    echo '<td>' . $row['city'] . '</td>';
                    echo '<td>' . $row['depot'] . '</td>';
                    echo '<td>';
                    if (array_key_exists('location', $row)) {
                        echo $row['location'];
                    }else{
                        echo "Not needed!";
                    }
                    echo '</td>';
                    echo '<td>' . $row['make'] . '</td>';
                    echo '<td>' . $row['serial_no'] . '</td>';
                    echo '<td>';
                    if (isset($row['megapixel'])) {
                        echo $row['megapixel'];
                    } else {
                        echo "Not needed!";
                    }
                    echo '</td>';
                    echo '<td>' . $row['purchase_date'] . '</td>';
                    echo '<td>';
                    if (isset($row['expiry_date'])) {
                        echo $row['expiry_date'];
                    } else {
                        echo 'error';
                    }'</td>';
                    echo '<td>';
                    if (isset($row['insert_date_time'])) {
                        echo $row['insert_date_time'];
                    } else if (isset($row['ins_date'])) {
                        echo $row['ins_date'];
                    } else {
                        echo 'not needed';
                    }'</td>';
                    echo '<td>';
                    if ($row['status'] == 1) {
                        echo '<p> <span class="btn btn-success"> on </span> </p>';
                        $onDevicesCount++;
                    } else {
                        echo '<p> <span class="btn btn-danger"> off </span> </p>';
                        $offDevicesCount++;
                    }
                    echo '<td>' . $row['remark'] . '</td>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo "No records found.";
            }
          // Calculate total devices
    $totalDevices = $onDevicesCount + $offDevicesCount;

     // Display totals below the table
    echo '<tr>';
    echo '<td >Total ON : </td><td>' . $onDevicesCount . '</td> 
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>'; 
    echo '</tr>';
    echo '<tr>';
    echo '<td>Total OFF : </td><td>' . $offDevicesCount . '</td> 
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Total : </td><td>' . $totalDevices . '</td> 
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>';  
    echo '</tr>';
}
        ?>
        </tbody>
    </table>
</div>
</body>
<script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
<script >
$(document).ready(function() {
    new DataTable('#data_table', {
        layout: {
            topStart: {
                buttons: ['excel','print']
            }
        }
    });
});
</script>
</html>

