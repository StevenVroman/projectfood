<?php
include_once 'scripts/config.php';
include_once 'scripts/api.php'; 
$cookie_name = "hungry";
$result = false;
if(!isset($_COOKIE[$cookie_name])) { // terug sturen als cookie niet bestaat
    header("location: login.php");
}
 ?>

<?php
if(!empty($_POST["Search"]) && is_string($_POST["Search"])) 
{
    $result=true;
    include_once 'scripts/config.php';
    include_once 'scripts/api.php';

    $catnaam = $_POST["Search"]; 
    $catover = CallAPI("GET", $DB."/search.php?s=".$catnaam); 
    $count = 0;
    
        foreach($catover as $cat){
            if(is_array($cat)){
                $count = count($cat);
                $result=true;
            }
            else{
             $count=0;
             $result=false;
            }
        }
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>search recipe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/screen.css">
</head>
<body id="search" class="container-fluid">
<div id="top" class="row"> 
            <div id="topbutton" class="col-11">
                <div class="row float-right">
                <input type="submit" class="btnregis form-control col-3" value="Profiel" name="Profiel" onclick="window.location.href='profiel.php'" />
                <input type="submit" class="btnregis form-control col-3" value="logout" name="logout" onclick="window.location.href='logout.php'" />
                </div>
            </div>
    <div id="navigatie" class="col-12"> 
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link active" href="search.php">Lookup Meal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="latest.php">Latest Added</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="random.php">Random Recipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="region.php">Your Region</a>
                </li>
            </ul>
            </div>
        </nav>  
    </div>
    <div id="logo">
        <img src="/pics/logowhite2.png" alt="logo">
    </div>  
</div>
<div class="bg row">
<section id="middle" class="col-12">
    <div id="search" class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
                            <form class="zoek" action ="<?php $_SERVER['PHP_SELF'] ?>"  method="POST">
                                <div class="card-body row no-gutters align-items-center">

                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input class="form-control form-control-lg form-control-borderless" name="Search" id="Search" placeholder="search your favorite">
                                    </div>

                                    <div id="button" class="col-lg-4 col-md-2 col-sm-12">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>

        </div>
        <div id="result">
        <?php
        if($result == true)
        {
             for( $i =0; $i < $count;$i++){  
                ?>
                <a class="row" href='recipe.php?id=<?php echo $catover['meals'][$i]['idMeal']?>'><div class='catover '>
                <h3><?php echo $catover['meals'][$i]['strMeal']?></h3>
                </div></a>
                <?php
                }  
        }
        else
        {
            echo("<h3> No result Found</h3>");
        }
        ?>
    
     </div>
    </div>
</section>
</div>
<footer class="row">
    <span>Api used : &nbsp 
    <a href="https://www.themealdb.com/api.php"> The MealDB</a> </span>
    

</footer>
</body>
</html>