<?php include_once 'scripts/config.php';?>
<?php include_once 'scripts/api.php'; 
$areas = CallAPI("GET", $DB."/list.php?a=list");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/screen.css">
    <title>Register</title>
    
</head>
<body id="registerpage">
<div id="register">
    <div class="container fill">
        <div class="col-12 login-form-2">
                <div id="logopic">
                <img src="pics/logo.png" alt="logo"> 
                </div>
                    <form action ="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="registerform">
                        <div class="form-group">
                        <label for="user">Choose a Username</label>
                            <input type="text" class="form-control" placeholder="Username" value="" required name="login" id="user"/>
                        </div>
                        <div class="form-group">
                        <label for="pass">Choose a Password</label>
                            <input type="password" class="form-control" placeholder="Password" value="" name="pass" id = "pass"required />
                        </div>
                        <div class="form-group">
                        <label for="pass">Retype Password</label>
                            <input type="password" class="form-control" placeholder="Password" value="" name="pass2" id = "pass2"required />
                        </div>
                        <div class="form-group">
                        <label for="pass">Choose Your type of food</label> <br />
                        <select>
                            <?php //print_r($categories);
                        foreach ($areas as $area) {
                            for( $i =0; i<=15;$i++){
                               print("<option value=".$i.">".$area[$i]['strArea']."</option>"); 
                            }

                        }?>
                        </select>
                        
                        </div>
                        <div class="container form-group">
                        <div class="row">
                             <div class="col-12">
                                <input type="submit" class="btnregis form-control" value="Register" name="Registreer" onclick="window.location.href='register.php'" />
                             </div>
                        </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
</body>
</html>
