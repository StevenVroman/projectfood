<?php
$cookie_name = "hungry";

if(!isset($_COOKIE[$cookie_name])) { // terug sturen als cookie niet bestaat
    header("location: login.php");
}
 ?>

 <?php include_once 'scripts/config.php';
  include_once 'scripts/api.php';
$categories = CallAPI("GET", $DB."/categories.php"); 

$count = 0;
foreach ($categories as $type) {
    $count+= count($type);
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/screen.css">
</head>
<body id="home" class="container-fluid">
<div id="top" class="row"> 
            <div id="topbutton" class="col-11">
                <div class="row float-right">
                <input type="submit" class="btnregis form-control col-3" value="Profiel" name="Profiel" onclick="window.location.href='register.php'" />
                <input type="submit" class="btnregis form-control col-3" value="logout" name="logout" onclick="window.location.href='register.php'" />
                </div>
            </div>
    <div id="navigatie" class="col-12"> 
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="#">Lookup Meal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Latest Added</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="#">Random Recipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Your Region</a>
                </li>
            </ul>
            </div>
        </nav>  
    </div>
    <div id="logo">
        <img src="/pics/logowhite2.png" alt="logo">
    </div>  
</div>
<section id="middle" class="row">
    
<?php for( $i =0; $i<= $count-1;$i++){                        
    ?>
    
    <div class="item col-lg-2 col-md-4 col-sm-12 " style="background-image:
     url(<?php echo $categories['categories'][$i]['strCategoryThumb'] ?>)">
        <a href="#url"><div id="title" class="row col-12">
         <h2><?php echo $categories['categories'][$i]['strCategory'] ?></h2>
        </div></a>
     </div><?php
    }
    ?>
   
</section>
</body>
</html>