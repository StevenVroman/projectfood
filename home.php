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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/screen.css">
</head>
<body id="home">
<div id="top">
    <div id="navigatie"> 
    <div class="row">
    <nav class="navbar navbar-expand-lg ">
            <img src="/pics/logowhite.png" alt = "logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto justify-content-center  align-bottom">
                 <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                 </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Disabled</a>
                </li>
            </ul>
        <form class="form-top col-lg-8 col-md-8 col-sm-7 col-xs-12 row">
                <input id="profiel" type="submit" class="btnregis mx-auto form-control col-lg-5 col-md-5 col-sm-5 col-xs-12" value="Profiel" name="Profiel" onclick="window.location.href='register.php'" />
                <input id= "logout" type="submit" class="btnregis mx-auto  form-control col-lg-5 col-md-5 col-sm-5 col-xs-12" value="Logout" name="Logout" onclick="window.location.href='register.php'" />
        </form>
    </div>
    </nav>
    </div>
    </div>

</div>

    
</body>
</html>