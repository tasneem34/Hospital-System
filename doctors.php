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

<body class="doc">
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
    <div class="PP">

        <fieldset>
            <legend> Doctors </legend>
            <form method="POST" action="InsertedDoc.php">




                <div class="input-group">
                    <input type="text" id="d-fristName" name="frist_name" required>
                    <label for="d-fristName">Frist Name </label>
                </div>
                <div class="input-group">
                    <input type="text" id="d-lastName" name="last_name" required>
                    <label for="d-lastName">Last Name</label>
                </div>
                <div class="select-list" >
                    <label for="specialty" >Choose Your Specialty:</label>
                    <br>

                    <select name="specialty" id="specialty">
                        <option value="Internist">Internist</option>
                        <option value="Cardiologist">Cardiologist</option>
                        <option value="	Pediatrician">Pediatrician</option>
                        <option value="General-Surgeon">General Surgeon</option>
                        <option value="	Gastroenterologist">Gastroenterologist</option>
                        <option value="Orthopaedic-Surgeon">Orthopaedic Surgeont</option>
                        <option value="Psychiatrist">Psychiatrist</option>
                        <option value="	Respirologist">	Respirologist</option>
                        <option value="	Oncologist">Oncologist</option>
                      </select>
                    
                </div>





                <input type="submit" >

            </form>

        </fieldset>


    </div>
</div>

</body>

</html>