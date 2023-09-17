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
</head>

<body class="admission">

    <div class="PP">

        <fieldset>
            <legend> Admissions </legend>
            <form method="POST" action="InsertedAddmission.php">


                <div class="input-group">
                    <input type="text" id="p-id" name="p_id" required>
                    <label for="p-id">Patient ID</label>
                </div>
                <div class="input-group">
                    <input type="text" id="attD-id" name="attD_id" required>
                    <label for="attD">Attending Doctor ID</label>
                </div>

                <div class="input-group">
                    <input type="text" id="diagnosis" name="diagnosis" required>
                    <label for="diagnosis">Diagnosis</label>
                </div>
                <div class="input-group">
                    <input type="date" id="add-date" name="add_date" required>
                    <label for="add-date">Admission Date</label>
                </div>
                <div class="input-group">
                    <input type="date" id="dis-date" name="dis_date" required>
                    <label for="dis-date">Discharge Date</label>
                </div>


                <input type="submit"  >

            </form>

        </fieldset>



    </div>
</div>
<!-- <div class="popup" id = "popup">

   <img src="images/check.png">
   <h2>
       Thank You!
   </h2>
   <p>Your information has been successfully submited. Thanks!</p>
   <button type="button"  onclick="closePopup()" class="ok"  >OK</button>

       
</div>


<script>
  let popup=document.getElementById("popup")
   function openPopup(){

       popup.classList.add("open-popup")

   }

   function closePopup(){
       popup.classList.remove("open-popup")

       
   }

</script> -->
</body>

</html>