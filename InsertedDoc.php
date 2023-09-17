<?php

//Check if user coming from request 

$serverName = "DESKTOP-1VMRK9D\SQLEXPRESS";
$connectionInfo = array("Database" => "hospital", "UID" => "user", "PWD" => "pl2project");
$conn = sqlsrv_connect($serverName, $connectionInfo);

$frist_name=$_REQUEST['frist_name'];
$last_name=$_REQUEST['last_name'];
$specialty=$_REQUEST['specialty'];
$errflag=false;
$errmsg="<div class='connect'>
<img src='images/notCheck.png'>
<h2>
    Sorry !
</h2>
<p> ERROR Ocuuerd </p> ";


if (!preg_match("/^[a-zA-Z]*$/",$frist_name) || !preg_match("/^[a-zA-Z]*$/",$last_name)){
    
    $errmsg=$errmsg.'<p>Only Alphabets And Whitespace Are Allowed In Names </p>';
    $errflag=true;

}


if ($errflag){

    $errmsg=$errmsg.'</div>';
    echo $errmsg;

}else {


    $sql="INSERT INTO doctors VALUES('$frist_name','$last_name','$specialty')";
    $res= sqlsrv_query($conn,$sql);

if($res==false)
{
    echo '<div class="connect">
    <img src="images\notCheck.png">
    <h2>
        Sorry !
    </h2>
    
    <p> ERROR Ocuuerd </p>
    <p>Insertion Failed. Ooops!</p> 
    
            
    </div>
    ';

    
} else{
    
    echo '<div class="connect" >
    <img src="..\images\check.png">
    <h2>
        Thank You!
    </h2>
    <p>Inserted Successfully. Thanks!</p> 
    
            
</div>
';
}

}

?>

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

<body class="PHP">
</body>
</html>






