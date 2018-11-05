<?php
 include_once 'scripts/config.php';?>
<?php include_once 'scripts/api.php';
$users = CallAPI("GET", $DB2."/tblusers");
print_r($users);
if ($_SERVER['REQUEST_METHOD'] == 'POST') 


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
    <title>login</title>
    
</head>
<body id="loginpage">
<div id="login">
    <div class="container">
        <div class="col-12 login-form-2">
            <img src="pics/logo.png" alt="logo" id="logo">
                    <form action ="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" value="" required />
                        </div>
                        <div class="container form-group">
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" class="btnSubmit form-control" value="Login" />
                            </div>
                             <div class="col-6">
                                <input type="submit" class="btnregis form-control" value="Registreer" />
                             </div>
                            <div class="col-12">
                                <a href="#" class="btnForgetPwd" value="Login">Forgot Password?</a>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
</body>
</html>