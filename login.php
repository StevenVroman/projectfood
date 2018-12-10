<?php
 include_once 'scripts/config.php';?>
<?php include_once 'scripts/api.php';
$users = CallAPI("GET", $DB2."/tblusers");
$wrongpass = false;
$forgotpass= false;
$cookie_name = "hungry";

if(isset($_COOKIE[$cookie_name])) {
    header("location: home.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        //login button
        if(isset($_POST['login']) && isset($_POST['pass']))
        {
        $filledinlogin=$_POST['login'];
        $filledinpass=md5($_POST['pass']);
        foreach($users as $user){
            if($filledinlogin==$user["Username"] && $filledinpass==$user["Pass"])
            {
                //login is ok // heeft nog geen cookie //aanmaken en doorsturen
                $cookie_value = $filledinlogin;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                header("location: home.php");
            }
            else{

                $wrongpass=true;
            }
        }

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/screen.css">
    <title>login</title>
    
</head>
<body id="loginpage">
<div id="login">
    <div class="container fill">
        <div class="col-12 login-form-2">
                <div id="logopic">
                <img src="pics/logowhite.png" alt="logo"> 
                <h3 id='waar'></h3>
                </div>
                    <form action ="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="loginform">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" value="" required name="login"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" value="" name="pass" required />
                        </div>
                        <div class="container form-group">
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" class="btnSubmit form-control" value="Login" name="submit"/>
                            </div>
                             <div class="col-6">
                                <input type="submit" class="btnregis form-control" value="Register" name="Registreer" onclick="window.location.href='register.php'" />
                             </div>
                            <div class="col-12">
                                <a href="" class="btnForgetPwd " onclick="return confirm('testuser / test123')">Forgot Password?</a>
                            </div>
                        </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
</body>
<script>

   var verkeerdpas = "<?php echo $wrongpass; ?>";

   if (verkeerdpas==true){
    document.getElementById("waar").innerHTML="Password or Username is wrong";
       //message tonen dat niet overeenkomt
       //para = document.createElement("h3");
       // node = document.createTextNode("Username and or Password doestn match" );
       // para.appendChild(node);
       //document.getElementById("logopic").insertBefore(para, null);
    verkeerdpas=false;
   }
   else{
    document.getElementById("waar").innerHTML="";
   }
   if ($forgotpass==true){
       var forgotpass = "<?php echo $forgotpass;?>";
        alert("test account : User = testuser pass = test123");
        $forgotpass=false;
   }
   
</script>
</html>
