<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <title>
        Hospital Database
    </title>

</head>


<body class="patient">

    <header class=" header">
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

    <div class="PP">

        <fieldset>
            <legend> Patients </legend>
            <form method="post" action="InsertedPatient.php">


                <div class="select-list">
                    <?php
                    $serverName = "DESKTOP-1VMRK9D\SQLEXPRESS";
                    $connectionInfo = array("Database" => "hospital", "UID" => "user", "PWD" => "pl2project");
                    $conn = sqlsrv_connect($serverName, $connectionInfo);

                    $sql = "SELECT province_name FROM province_names";
                    $res = sqlsrv_query($conn, $sql);


                    echo '<label for="prov-name">Province Name</label>';
                    echo ' <br>';

                    echo '<select name="prov-name">';
                    echo '<option>Select Province Name</option>';

                    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {

                        echo '<option value' . $row['province_name'] . '>' . $row['province_name'] . '</option>';
                    }


                    echo '</select>';


                    ?>

                </div>
                <br>
                <br>
                <div class="input-group">
                    <input type="text" id="p_fristName" name="p_fristName" required>
                    <label for="p-fristName">Frist Name </label>
                </div>
                <div class="input-group">
                    <input type="text" id="p_lastName" name="p_lastName" required>
                    <label for="p-lastName">Last Name</label>
                </div>
                <div class="input-group">
                    <input type="text" id="city" name="city" required>
                    <label for="city">City</label>
                </div>
                <div class="input-group">
                    <input type="text" id="allerge" name="allerge" required>
                    <label for="allerge">Allergies</label>
                </div>
                <div class="input-group">
                    <input type="date" id="birth_date" name="birth_date" required>
                    <label for="birth-date">Birth Date</label>
                </div>

                <label calss="redio-input">Gender</label>

                <div class="radio">

                    <input type="radio" id="Male" name="gender" value="M" required>
                    <label for="Male" calss="redio-input">Male</label>
                    <input type="radio" id="Female" name="gender" value="F" nam required>
                    <label for="Female" calss="redio-input">Female</label>


                </div>
                <label calss="-weight">Weight</label>

                <div class="slider">

                    <input type="range" class="slid" min="0" max="200" value="100" oninput="rangeValue1.innerText = this.value" name="weight">
                    <span id="rangeValue1">100</span>

                </div>

                <label calss="-weight">Height</label>

                <div class="slider">

                    <input type="range" class="slid" min="0" max="200" value="100" oninput="rangeValue2.innerText = this.value" name="height">
                    <span id="rangeValue2">100</span>

                </div>




                <input type="submit">

            </form>

        </fieldset>


    </div>
    </div>



</body>

</html>