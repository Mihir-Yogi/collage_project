<?php

include("DBoperation.php");


// Check if rowData is received
    if(isset($_POST['rowData'])) {
        // Decode the JSON string to PHP array
        $rowData = json_decode($_POST['rowData'], true);

        // Instantiate DbOperation
        $dbOperation = new DbOperation();

        // Insert rowData into the database
        $rowsAffected = $dbOperation->insertRowData($rowData);

        // Check if the insertion was successful
        if ($rowsAffected > 0) {
            echo "Row data inserted successfully!";
        } else {
            echo "Error: Failed to insert row data!";
        }
    } else {
        // If rowData is not received
        echo "Error: Row data not received!";
    }
?>