<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">


    <title>
        Hospital Database
    </title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            <?php
            $serverName = "DESKTOP-1VMRK9D\SQLEXPRESS";
            $connectionInfo = array("Database" => "hospital", "UID" => "user", "PWD" => "pl2project");
            $conn = sqlsrv_connect($serverName, $connectionInfo);

            $male = sqlsrv_query($conn, "SELECT COUNT(gender)as Males FROM patients WHERE gender LIKE 'M' ");


            $row = sqlsrv_fetch_array($male, SQLSRV_FETCH_ASSOC);
            $male = mb_substr($row['Males'], 0, 2);
            // $male = $male * 10;

            $female = sqlsrv_query($conn, "SELECT COUNT(gender)as Males FROM patients WHERE gender LIKE 'F' ");


            $row = sqlsrv_fetch_array($female, SQLSRV_FETCH_ASSOC);
            $female = mb_substr($row['Males'], 0, 2);
            // $female = $female * 10;

            ?>

            var data = google.visualization.arrayToDataTable([
                ['Gender', 'Number of Genders'],
                <?php
                echo "['Female'," . $female . "],";
                echo "['Male'," . $male . "],";

                ?>

            ]);

            var options = {
                title: 'Genders'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);

        }
    </script>



</head>

<body class="well">

    <div>
        <header class="header">
            <nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home </a></li>
                    <li class="nav-item"><a class="nav-link" href="patients.php">Patients</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctors.php">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="admissions.php">Admissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="province.php">Province</a></li>
                    <li class="nav-item"><a class="nav-link" href="display.php">Display Data</a></li>

                </ul>
            </nav>


        </header>

    </div>
    <div id="piechart" class="piechart"></div>


    <script type="text/javascript">
        <?php
        $serverName = "DESKTOP-1VMRK9D\SQLEXPRESS";
        $connectionInfo = array("Database" => "hospital", "UID" => "user", "PWD" => "pl2project");
        $conn = sqlsrv_connect($serverName, $connectionInfo);
    
        ?>
        google.charts.load('current', {
            'packages': ['corechart'],
            'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            var data = google.visualization.arrayToDataTable([
                ['Day', 'Admission'],
                <?php

                while ($row = mysqli_fetch_assoc($chartQueryRecords)) {
                    echo "['" . $row['year'] . "'," . $row['sales'] . "," . $row['expenses'] . "],";
                }
                ?>
            ]);

            var options = {};

            var chart = new google.visualization.LineChart(document.getElementById('regions_div'));

            chart.draw(data, options);
        }
    </script>



</body>

</html>