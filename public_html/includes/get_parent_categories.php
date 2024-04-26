<?php
include_once("../database/constant.php");
include_once("../database/db.php");

class ParentCategories {
    private $con;

    function __construct(){
        $db = new Database();
        $this->con = $db->connect();
    }

    public function getParentCategories() {
        // Retrieve only parent categories (where parent_categoryid = 0)
        $result = mysqli_query($this->con, "SELECT * FROM category WHERE perent_category = 0");

        $response = array();
        // Loop through each parent category and create options for the dropdown
        while($row = mysqli_fetch_array($result)){
            $response[] = array(
                'id' => $row['id'],
                'name' => $row["category_name"]
            );
        }

        // Convert the response array to JSON and echo it
        echo json_encode($response);
    }
}

// Instantiate the class and call the method
$parentCategories = new ParentCategories();
$parentCategories->getParentCategories();
?>
