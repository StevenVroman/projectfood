<?php
$cookie_name = "hungry";

if(!isset($_COOKIE[$cookie_name])) { // terug sturen als cookie niet bestaat
    header("location: login.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/screen.css">
</head>
<body id="home">
<div id="top">
    <div id="navigatie"> 
        <div id="row"> 
            <div id="logopic" class="col-lg-4 col-md-4 col-sm-12 .col-xs-12 float-left">
                <img src="pics/logowhite.png" alt="logo" class="img-fluid">
            </div>
            <div class="form-top row col-lg-4 col-md-4 col-sm-8 .col-xs-12 float-right">
                <input id="profiel" type="submit" class="btnregis form-control col-4" value="Profiel" name="Profiel" onclick="window.location.href='register.php'" />
                <input id= "logout" type="submit" class="btnregis  form-control col-4" value="Logout" name="Logout" onclick="window.location.href='register.php'" />
            </div>
     
        </div>
    </div>
</div>

    
</body>
</html>