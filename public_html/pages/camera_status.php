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
        <?php include_once("user_header.php"); ?>

<div>
<svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,128L48,128C96,128,192,128,288,144C384,160,480,192,576,218.7C672,245,768,267,864,261.3C960,256,1056,224,1152,213.3C1248,203,1344,213,1392,218.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

</div>

        <br>

        
<div class="container" style="width: 100%;">

<div class="alert">
    
</div>

<form method="post" class="form-horizontal" id="active_form">
<div class="dropdown">
    <div class="row">
        <div class="col-md-5">
                <label for="depot">City</label>
                <select name="camera_d_cat" class="form-control" id="camera_d_cat">
                    <option value="">Select depot</option>
                </select>
        </div>
        <div class="col-md-5">
                <label for="child depot">Depot</label>
                <select name="camera_c_depot" class="form-control" id="camera_c_depot">
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
    <th scope="col">device</th>
    <th scope="col">Depot</th>
    <th scope="col">Location</th>
    <th scope="col">Camera Location</th>
    <th scope="col">make</th>
    <th scope="col">serial no</th>
    <th scope="col">CH</th>
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
        if ($con === "DATABASE_CONNECTION_FAIL") {
            die("Database connection failed.");
        }

    if(isset($_POST['submit']) && isset($_POST['camera_d_cat']) && isset($_POST['camera_c_depot'])){
        $depot = $_POST['camera_d_cat'];
        $category = $_POST['camera_c_depot']; 

        $getQuery = "SELECT 
                    camera_collection.camera_id,
                    camera_collection.category, 
                    category.category_name,
                    child_category.child_name,
                    camera_collection.location,  
                    camera_collection.make, 
                    camera_collection.serial_no, 
                    camera_collection.ch, 
                    camera_collection.mega_pixel,
                    camera_collection.purchase_date, 
                    camera_collection.ex_date, 
                    camera_collection.insert_date_time,
                    camera_collection.status 
            FROM camera_collection
            JOIN category ON category.pid = camera_collection.depot 
            JOIN child_category ON child_category.cid = camera_collection.category 
            WHERE category.pid = $depot AND child_category.cid = $category";

        getData($getQuery);
    
        $getDevice = "SELECT 
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
    WHERE category.pid = $depot AND child_category.cid = $category AND device_collection.status <> 0";
        getData($getDevice);
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
        
        $index = 0; // Initialize an index counter
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>';
            if (isset($row['device_category']) && $row['device_category'] !== '') {
                echo $row['device_category'];
            } else {
                echo "camera";
            }
            echo '</td>';
            echo '<td>'.$row['category_name'].'</td>';
            echo '<td>'.$row['child_name'].'</td>';
            echo '<td>';
            if (array_key_exists('location', $row)) {
                echo $row['location'];
            }else{
                echo "Not needed!";
            }
            echo '</td>';
            echo '<td>'.$row['make'].'</td>';
            echo '<td>'.$row['serial_no'].'</td>';
            echo '<td>'.$row['ch'].'</td>';
            echo '<td>';
            if (array_key_exists('mega_pixel', $row)) {
                echo $row['mega_pixel'];
            }else{
                echo "Not needed!";
            }
            echo '</td>';
            echo '<td>'.$row['purchase_date'].'</td>';
            echo '<td>';
            if(isset($row['ex_date'])){
                echo $row['ex_date'];
            }else if(isset($row['expiery_date'])){
                echo $row['expiery_date'];
            }else{
                echo 'error';
            }'</td>';
            echo '<td>';
            if(isset($row['insert_date_time'])){
                echo $row['insert_date_time'];
            }else if(isset($row['ins_date'])){
                echo $row['ins_date'];
            }else{
                echo 'not needed';
            }'</td>';
            echo '<td>';
        

    // Dropdown menu
    echo '<select name="status'.$index.'">'; 
    echo '<option value="1">On</option>';
    echo '<option value="0">Off</option>';
    echo '</select>';
    echo '</td>';
    echo '<td>';
    // Remark textarea
    echo '<textarea name="remark'.$index.'" style="display: none;"></textarea>';
    echo '</td>';
    echo '</tr>';
    $index++; 
}
    } else {
        echo "No records found.";
    }
}

?>
</tbody>

</table>

<input type="submit" class="btn btn-success" value="submit" id="a_submit" name="a_submit">

</div>
</body>

<script>
$(document).ready(function() {
    var DOMAIN = "http://localhost/collage_project/public_html";
    var totalRows = $('#data_table tbody tr').length;
    var successCount = 0;


    $('#data_table').on('change', 'select', function() {
        var selectedOption = $(this).val();
        var remarkTextarea = $(this).closest('tr').find('textarea');
        
        // Check if the selected option is 'Off'
        if (selectedOption === '0') {
            // Show the remark textarea
            remarkTextarea.show();
        } else {
            // Hide the remark textarea
            remarkTextarea.hide();
        }
    });



        $('#a_submit').click(function() {
            var tableRows = $('#data_table tbody tr');
            tableRows.each(function() {
                var rowData = {};
                var cells = $(this).find('td:not(:last-child)');
                cells.each(function(index) {
                    var header = $('#data_table th').eq(index).text().trim();
                    var value = $(this).text().trim();
                    rowData[header] = value;
                });
                var status = $(this).find('select').val();
                rowData['status'] = status;

                // Check if the status is 'Off'
            if (status == '0') {
                // Show the remark textarea
                var remark = $(this).find('textarea').val().trim();
                if (remark == '') {
                    alert('Please fill in the remark for Off status.');
                    return false;
                }
                // Add the remark to the rowData
                rowData['remark'] = remark;
            } else {
                // Hide the remark textarea if status is not 'Off'
                $(this).find('textarea').hide();
            }

            // alert(JSON.stringify(rowData));
                $.ajax({
                    url: DOMAIN+'/includes/cam_status.php',
                    method: 'POST',
                    data: { rowData: JSON.stringify(rowData) },
                    success: function(response) {
                        // alert(response);
                        successCount++; 
                        // alert(successCount);
                    if (successCount === totalRows) {

                        var successAlert = '<div class="alert alert-success" role="alert">' +
                            'Status is SUCCESSFULLY submitted you can now check it or you can generate a report from here <a href="device_table.php" class="alert-link">Generate Report</a>.' +
                            '</div>';
                        $('.alert').append(successAlert);
                    }
                },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });

        new DataTable('#data_table', {
        pagingType: 'simple_numbers'
        });
    });


</script>
<script src="../js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
<script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.4/js/dataTables.foundation.js"></script>
</html>
