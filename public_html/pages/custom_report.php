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

    <script>
        function validateForm() {
        var date = document.getElementById("date").value;
        if (date === "") {
            alert("Please select a date.");
            return false;
        }
        return true;
    }
    </script>
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
<form method="post" class="form-horizontal" id="active_form"  onsubmit="return validateForm()">
        <div class="dropdown">
            <div class="row">
                <div class="col-md-3">
                    <label for="city">Depot</label>
                    <select name="camera_d_cat" class="form-control" id="camera_d_cat">
                        <option value="">Select Depot</option>
                        <!-- options dynamically if needed -->
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="depot">Location</label>
                    <select name="camera" class="form-control" id="camera">
                        <option value="">Select Location</option>
                        <?php
                            $printedChildNames = array(); // Array to store child names already printed

                            while ($depotRow = mysqli_fetch_assoc($depotResult)) {
                                // Check if the child name has already been printed
                                if (!in_array($depotRow['child_name'], $printedChildNames)) {
                                    // If not printed, print the child name and add it to the printedChildNames array
                                    echo '<option value="' . $depotRow['cid'] . '">' . $depotRow['child_name'] . '</option>';
                                    $printedChildNames[] = $depotRow['child_name'];
                                }
                            }
                            ?>
                        <!-- options dynamically based on selected city if needed -->
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="start_date">Date</label>
                    <input type="date" name="date" class="form-control" id="date">
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
        <th scope="col">Depot</th>
        <th scope="col">Location</th>
        <th scope="col">On Device</th>  
        <th scope="col">Off Device</th>
        <th scope="col">Total devices</th>
        <th scope="col">remarks</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_POST['submit_dates'])) {

            $city_row = $_POST['camera_d_cat'];
            $depot_row = $_POST['camera'];
            $date = $_POST['date'];

            // Construct the SQL query
            $selectedCityId = mysqli_real_escape_string($con, $city_row);
            $selectedDepotId = mysqli_real_escape_string($con, $depot_row);


if (!empty($selectedCityId) && !empty($selectedDepotId)) {

    $cityNameQuery = "SELECT category_name FROM category WHERE pid = $selectedCityId";
    $cityNameResult = mysqli_query($con, $cityNameQuery);


    if ($cityNameResult === false) {
        die("Error in city query: " . mysqli_error($con));
    }
    $cityNameRow = mysqli_fetch_assoc($cityNameResult);
    $city = $cityNameRow['category_name'];

    $depotNameQuery = "SELECT child_name FROM child_category WHERE cid = $selectedDepotId";
    $depotNameResult = mysqli_query($con, $depotNameQuery);

    if ($depotNameResult === false) {
        die("Error in depot query: " . mysqli_error($con));
    }
    $depotNameRow = mysqli_fetch_assoc($depotNameResult);
    $depot = $depotNameRow['child_name'];


    // // Query for ON devices count
    // $query_result = mysqli_query($con, $query);
    // $on_count = mysqli_fetch_assoc($query_result)['on_count'];

    // Query for ON devices count
    $query = "SELECT COUNT(status_id) AS on_count FROM `camera_status` WHERE `city` =  '$city' AND `depot` = '$depot' AND `submit_time` = '$date'  AND `status` = '1' ";
    $query_result = mysqli_query($con, $query);
    $on_count = mysqli_fetch_assoc($query_result)['on_count'];

    // Query for OFF devices count
    $query = "SELECT COUNT(status_id) AS off_count FROM `camera_status` WHERE `city` =  '$city' AND `depot` = '$depot' AND `submit_time` = '$date'  AND `status` = '0' ";
    $query_result = mysqli_query($con, $query);
    $off_count = mysqli_fetch_assoc($query_result)['off_count'];

    // Query for total devices count
    $query = "SELECT COUNT(status_id) AS total_device FROM `camera_status` WHERE `city` =  '$city' AND `depot` = '$depot'  AND `submit_time` = '$date'  ";
    $query_result = mysqli_query($con, $query);
    $total_device = mysqli_fetch_assoc($query_result)['total_device'];


    $remarksQuery = "SELECT remark FROM `camera_status` WHERE `city` = '$city' AND `depot` = '$depot' AND `submit_time` = '$date'";
    $remarksResult = mysqli_query($con, $remarksQuery);

    if (!$remarksResult) {
        die("Error in remarks query: " . mysqli_error($con));
    }

    $remarks = array();
    while ($row = mysqli_fetch_assoc($remarksResult)) {
        $remarks[] = $row['remark'];
    }

$totalRemarks = implode(", ", $remarks);
    // Output data based on the retrieved city and selected depot
    echo "<tr>";
    echo "<td>$city</td>";
    echo "<td>$depot</td>";
    echo "<td>$on_count</td>";
    echo "<td>$off_count</td>";
    echo "<td>$total_device</td>";
    echo "<td>$totalRemarks</td>"; 
    echo "</tr>";



} elseif (!empty($selectedDepotId)) {
    // Only depot is selected, filter data based on depot

    mysqli_data_seek($cityResult, 0); // Reset city result pointer
    while ($cityRow = mysqli_fetch_assoc($cityResult)) {
        // Fetch city name for the current city row
        $city = $cityRow['category_name'];

        $depotNameQuery = "SELECT child_name FROM child_category WHERE cid = $selectedDepotId";
        $depotNameResult = mysqli_query($con, $depotNameQuery);

        if ($depotNameResult === false) {
            die("Error in depot query: " . mysqli_error($con));
        }
        $depotNameRow = mysqli_fetch_assoc($depotNameResult);
        $depot = $depotNameRow['child_name'];

        // Query for ON devices count based on both city and depot
        $query = "SELECT COUNT(status_id) AS on_count FROM `camera_status` WHERE `city` = '$city' AND `depot` = '$depot'  AND `submit_time` = '$date'  AND `status` = '1'";
        $query_result = mysqli_query($con, $query);
        if (!$query_result) {
            die("Error in ON devices query: " . mysqli_error($con));
        }
        $on_count = mysqli_fetch_assoc($query_result)['on_count'];

        // Query for OFF devices count based on both city and depot
        $query = "SELECT COUNT(status_id) AS off_count FROM `camera_status` WHERE `city` = '$city' AND `depot` = '$depot'  AND `submit_time` = '$date'  AND `status` = '0'";
        $query_result = mysqli_query($con, $query);
        if (!$query_result) {
            die("Error in OFF devices query: " . mysqli_error($con));
        }
        $off_count = mysqli_fetch_assoc($query_result)['off_count'];

        // Query for total devices count based on both city and depot
        $query = "SELECT COUNT(status_id) AS total_device FROM `camera_status` WHERE `city` = '$city' AND `depot` = '$depot'  AND `submit_time` = '$date' ";
        $query_result = mysqli_query($con, $query);
        if (!$query_result) {
            die("Error in total devices query: " . mysqli_error($con));
        }
        $total_device = mysqli_fetch_assoc($query_result)['total_device'];


        $remarksQuery = "SELECT remark FROM `camera_status` WHERE `city` = '$city' AND `depot` = '$depot' AND `submit_time` = '$date'";
        $remarksResult = mysqli_query($con, $remarksQuery);

        $remarks = array();
        while ($row = mysqli_fetch_assoc($remarksResult)) {
            $remarks[] = $row['remark'];
        }

        $totalRemarks = implode(", ", $remarks);

        // Output data based on the retrieved city and selected depot
        echo "<tr>";
        echo "<td>$city</td>";
        echo "<td>$depot</td>";
        echo "<td>$on_count</td>";
        echo "<td>$off_count</td>";
        echo "<td>$total_device</td>";
        echo "<td>$totalRemarks</td>";
        echo "</tr>";
    }
}else{
    echo "data not available";
}

}
?>
        </tbody>
    </table>
</div>
</body>
<script>
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
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
</html>
