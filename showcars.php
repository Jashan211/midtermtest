<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car List</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

</head>
<body>
    <h1>List of Cars of brand <?php $make = $_POST['manufacturer'];echo $make?></h1>

    <?php

    $make = $_POST['manufacturer'];

    //Step1 - connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361558', 'gc200361558',  'IWrvd53ZK3');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //step 2 - create a SQL command
    $sql = "SELECT * FROM cars WHERE make = :manufacturer;";
    //step 3 - prepare the SQL command
    $cmd = $conn->prepare($sql);
    //$cmd->bindParam(':year',$year,PDO::PARAM_INT, 4);
    $cmd->bindParam(':manufacturer',$make,PDO::PARAM_STR, 30);
    //$cmd->bindParam(':model',$model,PDO::PARAM_STR, 20);
    //$cmd->bindParam(':colour',$colour,PDO::PARAM_STR, 20);
    //$cmd->bindParam(':milage',$milage,PDO::PARAM_INT, 20);

    //step 4 - execute and store the results
    $cmd->execute();
    $cars = $cmd->fetchAll();
    //step 5 - disconnect from the DB
    $conn = null;
    //create a table and display the results
    echo '<table class="table table-striped table-hover table-bordered">
            <tr><th class="active">Year</th>
                <th class="warning">Make</th>
                <th class="danger">Model</th>
                <th class="info">Colour</th>
                <th class="hover">Milage</th></tr>';

    foreach($cars as $car) {
        echo '<tr><td class="active">' . $car['year'] . '</td>
                      <td class="warning">' . $car['make'] . '</td>
                      <td class="info">' . $car['model'] . '</td>
                      <td class="danger">' . $car['colour'] . '</td>
                      <td class="hover">' . $car['milage'] . '</td></tr>';
    }
    echo'</table>';
    ?>

    <a class="btn btn-info" href="inputmake.php" role="button">Choose a new brand</a>

</body>

<!--Latest Query -->
<script src="js/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

</html>
