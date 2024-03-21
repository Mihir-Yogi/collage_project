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
<table class="table" id="data_table">
<div class="dropdown">
    <div class="row">
        <div class="col-md-4">
                <label class="form-label" for="depot">Depot</label>
                <select name="combo_d_cat" class="form-control" id="combo_d_cat">
                    <option value="">Select depot</option>
                </select>
        </div>
        <div class="col-md-4">
                <label class="form-label" for="child depot">category</label>
                <select name="combo_c_depot" class="form-control" id="combo_c_depot">
                    <option value=""></option>
                </select>
        </div>
        <div class="col-md-4">
                <label for="section" class="form-label" >section</label>
                <select class="form-control" name="combo_section" id="combo_section">

                <option value="1">section 1</option>
                <option value="2">section 2</option>
                </select>
        </div>
    </div>
</div>
<br>
<thead>
    <tr>
    <th scope="col">make</th>
    <th scope="col">serial no</th>
    <th scope="col">purchase date</th>
    <th scope="col">warranty</th>
    <th scope="col">expiry date</th>
    <th scope="col">status</th>
    </tr>
</thead>
<tbody>

    <tr>
    </tr>

</tbody>
</table>
</div>
</body>
<script src="../js/main.js"></script>

</html>
