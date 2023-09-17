<?php
$serverName = "DESKTOP-1VMRK9D\SQLEXPRESS";
$connectionInfo = array("Database" => "hospital", "UID" => "user", "PWD" => "pl2project");
$conn = sqlsrv_connect($serverName, $connectionInfo);
//GET days of current month
$currmonth = '8'; //datetime.month
$noofdays = 30;
if (
    $currmonth == '1' or $currmonth == '3' or $currmonth == '5' or $currmonth == '7'
    or $currmonth == '8' or $currmonth == '10' or $currmonth == '12'
)
    $noofdays = 31;
elseif ($currmonth == '2')
    $noofdays = 28;
$daynames = array();
$daycounts = array();
//loop over no of days
for ($i = 1; $i <= $noofdays; $i++) {

    $daynames[$i - 1] = $i . "/" . $currmonth . "/" . date("Y");
    $chartQuery = "SELECT ISNULL(COUNT(*),0) AS  num_of_admissions
        FROM addmissions 
    WHERE MONTH(addmission_date) LIKE '$currmonth' and DAY(addmission_date)='$i'";
    //echo $chartQuery;
    $chartQueryRecords = sqlsrv_query($conn, $chartQuery);


    $row = sqlsrv_fetch_array($chartQueryRecords, SQLSRV_FETCH_ASSOC);
    $chartQueryRecords = mb_substr($row['num_of_admissions'], 0, 2);
    $daycounts[$i - 1] = $chartQueryRecords;
}

// for($j=0;$j<$noofdays;$j++)
// {
//     echo $daynames[$j].'--->'.$daycounts[$j].'<br/>';
// }
//run query to retrive count and save to array
//save date into another array
// draw the graph

?>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day', 'Number of Admissions'],
                <?php
                for ($j = 0; $j < $noofdays; $j++) {
                    echo "['".$daynames[$j]."'," . $daycounts[$j] . "],";

                }
                ?>



            ]);

            var options = {
                title: 'Admissions Per Day',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
</body>

</html>
>