

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
<body class="prov">
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

    <fieldset >
      <legend > Province </legend>
     <form method="POST" action="InsertedProv.php">
         
        

         <div class="input-group">
            <input type="text" id="prov-fristName" name="prov-name" required>
            <label for="prov-fristName">Province Name </label>
         </div>



         <input type="submit"  >


     </form>

    </fieldset>

    
 </div>
 

</body>
</html>