<?php
$serverName = "DESKTOP-1VMRK9D\SQLEXPRESS";
$connectionInfo = array("Database" => "hospital", "UID" => "user", "PWD" => "pl2project");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = (sqlsrv_query($conn, "DELETE FROM province_names WHERE province_id ='$id'"));
}

?>


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


    <form action="display.php" method="post">
        <div class="display">
            <input type="submit" value="Doctors" name="doc">
            <input type="submit" value="Admissions" name="adm">
            <input type="submit" value="Province" name="prov">
            <input type="submit" value="Patients" name="pat">

        </div>




    </form>



</body>

</html>

<?php
$serverName = "DESKTOP-1VMRK9D\SQLEXPRESS";
$connectionInfo = array("Database" => "hospital", "UID" => "user", "PWD" => "pl2project");
$conn = sqlsrv_connect($serverName, $connectionInfo);


if (isset($_POST['prov'])) {

    $sql = "SELECT * FROM province_names";
    $res = sqlsrv_query($conn, $sql);
    if ($res) {
        echo '<table class="table">
    <tr>
         <th>Province ID</th>
         <th>Province Name</th>
         <th>Operation</th>

         
    </tr>';
        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
            echo "
        <tr>
         <td>" . $row['province_id'] . " </td>
         <td>" . $row['province_name'] . "</td>
         <td>
             <a href='display.php? id=" . $row['province_id'] . "' calss='btn' >Delete</a>

         </td>

        </tr>
        ";
        }
        echo '</table>';
    } else {
        echo "ERROR";
    }
}
if (isset($_POST['doc'])) {

    $sql = "SELECT * FROM doctors";
    $res = sqlsrv_query($conn, $sql);
    if ($res) {
        echo '<table class="table">
    <tr>
         <th>Doctor ID</th>
         <th>Frist Name</th>
         <th>Last Name</th>
         <th>Specialty</th>
         <th>Operation</th>


         
    </tr>';
        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
            echo "
        <tr>
         <td>" . $row['doctor_id'] . " </td>
         <td>" . $row['frist_name'] . "</td>
         <td>" . $row['last_name'] . "</td>
         <td>" . $row['specialty'] . "</td>

         <td>
             <a href='display.php? id=" . $row['doctor_id'] . "' calss='btn' >Delete</a>

         </td>

        </tr>
        ";
        }
        echo '</table>';
    } else {
        echo "ERROR";
    }
}
if (isset($_POST['adm'])) {

    $sql = "SELECT * FROM addmissions";
    $res = sqlsrv_query($conn, $sql);
    if ($res) {
        echo '<table class="table">
    <tr>
         <th>Patient ID</th>
         <th>Addmission Date</th>
         <th>Discharge Date</th>
         <th>Attending  Doctor ID</th>
         <th>Diagnosis</th>
         <th>Operation</th>


         
    </tr>';
        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
            $addmission_date =date_format( $row['addmission_date'],'Y-m-d');
            $discharge_date= date_format( $row['discharge_date'],'Y-m-d');
            echo "
        <tr>
        <td>" . $row['patient_id'] . " </td>
        <td>" . $addmission_date . "</td>
        <td>" . $discharge_date . "</td>
        <td>" . $row['attending_doctor_id'] . "</td>
        <td>" . $row['diagnosis'] . " </td>

         <td>
             <a href='display.php? id=" . $row['patient_id'] . "' calss='btn' >Delete</a>

         </td>

        </tr>
        ";
        }
        echo '</table>';
    } else {
        echo "ERROR";
    }
}
if (isset($_POST['pat'])) {

    $sql = "SELECT * FROM patients";
    $res = sqlsrv_query($conn, $sql);
    if ($res) {
        echo '<table class="table">
    <tr>
         <th>Patient ID</th>
         <th>Frist Name</th>
         <th>Last Name</th>
         <th>Gender</th>
         <th>Birth Date</th>
         <th>City</th>
         <th>Province ID</th>
         <th>Allergies</th>
         <th>Height</th>
         <th>Weight</th>
         <th>Operation</th>

         



         
    </tr>';

        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
            
            echo "
        <tr>
         <td>" . $row['patient_id'] . " </td>
         <td>" . $row['frist_name'] . "</td>
         <td>" . $row['last_name'] . "</td>
         <td>" . $row['gender'] . "</td>
         <td>" . date_format( $row['birth_date'],'Y-m-d') . " </td>
         <td>" . $row['city'] . "</td>
         <td>" . $row['province_id'] . "</td>
         <td>" . $row['allergies'] . "</td>
         <td>" . $row['height'] . "</td>
         <td>" . $row['weight'] . "</td>



         <td>
             <a href='display.php? id=" . $row['patient_id'] . "' calss='btn' >Delete</a>

         </td>

        </tr>
        ";
        }
        echo '</table>';
    } else {
        echo "ERROR";
    }
}

?>