<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Brand of Car</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

</head>
<body class="container">
    <h1>Select the Brand of Car</h1>

    <!--set attribute for form element to store user input-->
    <form method="post" action="showcars.php" class="form-horizontal">
        <fieldset class="form-group">
            <label for="manufacturer" class="col-sm-2">Brand of Car:</label>
            <select name="manufacturer" id="manufacturer" class="col-sm-4">
                <!--php for filling the options available for selection-->
                <?php
                //Step1 - Connect to db
                $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361558', 'gc200361558',  'IWrvd53ZK3');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //Step2 - create the sql statement
                $sql = "SELECT * FROM manufacturers";

                //Step3 - prepare and execute the SQL command
                $cmd = $conn->prepare($sql);
                $cmd->execute();
                $manufacturers = $cmd->fetchAll();

                //Step4 - Loop oover the results to build the List with <option> </option>
                foreach ($manufacturers as $manufacturer)
                {
                    echo '<option>' . $manufacturer['manufacturer'] . '</option>';
                }

                //Step4 - disconnect from DB
                $conn = null;
                ?>
            </select>
        </fieldset>
        <button class="btn btn-success col-sm-offset-2">Show Cars</button>
    </form>
</body>

<!--Latest Query -->
<script src="js/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

</html>
