<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <!--Third-party solution for pagination. Source: https://datatables.net/-->
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="script/script.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Sold Tractors</h2>
                </div>
                <input type="text" id="brandInput" onkeyup="search('brandInput', 1)" placeholder="Search for brand..">
                <input type="text" id="typeInput" onkeyup="search('typeInput', 2)" placeholder="Search for type..">
                <input type="text" id="priceInput" onkeyup="search('priceInput', 3)" placeholder="Search for price..">
                <?php
                require "model/Tractor.php";
                $model = new Tractor();
                $tractors = $model->getAll();
                if (count($tractors) == 0) {
                    echo "<p class='lead'><em>No records were found.</em></p>";
                } else {
                    echo "<table id='resTable' class='table table-bordered table-striped'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th id='brandHead' class='searchHead'>Brand <span  class=\"glyphicon glyphicon-search\"></span></th>";
                    echo "<th id='typeHead' class='searchHead'>Type <span class=\"glyphicon glyphicon-search\"></span></th>";
                    echo "<th id='priceHead' class='searchHead'>Price ($) <span class=\"glyphicon glyphicon-search\"></span></th>";
                    echo "<th>Perf. (HP)</th>";
                    echo "<th>Description</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    foreach ($tractors as $tractor) {
                        echo "<tr>";
                        echo "<td>" . $tractor->getId() . "</td>";
                        echo "<td>" . $tractor->getBrand() . "</td>";
                        echo "<td>" . $tractor->getType() . "</td>";
                        echo "<td>" . $tractor->getPrice() . "</td>";
                        echo "<td align='center'>" . $tractor->getPerformance() . "</td>";
                        echo "<td>" . $tractor->getDescription() . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>