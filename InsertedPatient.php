<?php

//Check if user coming from request 

$serverName = "DESKTOP-1VMRK9D\SQLEXPRESS";
$connectionInfo = array("Database" => "hospital", "UID" => "user", "PWD" => "pl2project");
$conn = sqlsrv_connect($serverName, $connectionInfo);

$prov_name=$_REQUEST['prov-name'];
$p_fristName=$_REQUEST['p_fristName'];
$p_lastName=$_REQUEST['p_lastName'];
$city=$_REQUEST['city'];
$allerge=$_REQUEST['allerge'];
$birth_date=$_REQUEST['birth_date'];
$gender=$_REQUEST['gender'];
$weight=$_REQUEST['weight'];
$height=$_REQUEST['height'];
$currentDate=date('Y-m-d');
$sel="SELECT province_id FROM province_names WHERE province_name LIKE '$prov_name' ";
$res1=sqlsrv_query($conn,$sel);
$row=sqlsrv_fetch_array($res1,SQLSRV_FETCH_ASSOC);
$prov_id=mb_substr($row['province_id'],0,2);


$errflag=false;
$errmsg="<div class='connect'>
<img src='images/notCheck.png'>
<h2>
    Sorry !
</h2>
<p> ERROR Ocuuerd </p> ";


if (!preg_match("/^[a-zA-Z]*$/",$p_fristName)||!preg_match("/^[a-zA-Z]*$/",$p_fristName)||
!preg_match("/^[a-zA-Z]*$/",$city)||!preg_match("/^[a-zA-Z]*$/",$allerge)){
    
    $errmsg=$errmsg.'<p>Only Alphabets And Whitespace Are Allowed In Names </p>';
    $errflag=true;

}

if ($weight<10){
    $errmsg=$errmsg.'<p> Invalid Weight </p>';
    $errflag=true;

}
if ($height<10){
    $errmsg=$errmsg.'<p>  Invalid height </p>';
    $errflag=true;

}

if ($birth_date>$currentDate){
    $errmsg=$errmsg.'<p>  Invalid BirthDate </p>';
    $errflag=true;

}


if ($errflag){

    $errmsg=$errmsg.'</div>';
    echo $errmsg;

}else {


    $sql="INSERT INTO patients VALUES('$p_fristName','$p_lastName','$gender','$birth_date','$city','$prov_id','$allerge','$height','$weight')";
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
    echo  $sql;
    echo $prov_id;

    
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






