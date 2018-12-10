<?php include_once 'scripts/config.php';?>
<?php include_once 'scripts/api.php'; 
$areas = CallAPI("GET", $DB."/list.php?a=list");
$userslist = CallAPI("GET", $DB2."/tblusers");
$overeenkomstpass = false;
$usertekort = false;
$passtekort= false;
$bestaatal=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = array();
        $filledinlogin=$_POST['login'];
        $filledinpass=$_POST['pass'];
        $filledinpass2=$_POST['pass2'];
        $keuzevalue = $_POST['keuzes'];
        $user["username"]=$filledinlogin;
        $user["Pass"]=$filledinpass;
        $user["FavFood"]=$keuzevalue;
    if (isset($_POST['Registreer'])) {
        //check als 4 velden ingevuld zijn
        if(strlen($filledinlogin)<=5){
            $usertekort=true; // fout
        }
        else{
            $usertekort=false;
        }
        if(strlen($filledinpass)<=5){
            $passtekort = true; //fout
        }
        else{
            $passtekort = false;
        }
        
        if($filledinpass == $filledinpass2){   
            $overeenkomstpass=false;
           }
        else{
            $overeenkomstpass=true; //fout
        }

        if(isset($_POST['login']) && isset($_POST['pass'])&& isset($_POST['pass2'])&& isset($_POST['keuzes']))
        {
           if($usertekort == false && $overeenkomstpass==false && $passtekort==false){
            //ga door
            foreach($userslist as $userlist){
                if($filledinlogin==$userlist["Username"] )
                $bestaatal=true;
                else{
                $bestaatal=false;
                }
            }
            if($bestaatal==false){
                $users = CallAPI("POST", $DB2."/tblusers",json_encode($user)); // goed
                header("location: login.php");
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
    <title>Profiel</title>
    
</head>
<body id="profiel">
<div id="profiel">
    <div class="container fill">
        <div class="col-12 login-form-2">
                <div id="logopic">
                <img src="pics/logowhite.png" alt="logo">
                </div>
                    <form action ="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="registerform">
                        <div class="form-group">
                        <label for="user"> Username</label>
                            <input type="text" class="form-control" placeholder="Username" value="" required name="login" id="user"/>
                        </div>
                        <div class="form-group">
                        <label for="pass">New Password</label>
                            <input type="password" class="form-control" placeholder="Password" value="" name="pass" id = "pass"required />
                        </div>
                        <div class="form-group">
                        <label for="pass">Retype new password</label>
                            <input type="password" class="form-control" placeholder="Password" value="" name="pass2" id = "pass2"required />
                        </div>
                        <div class="form-group">
                        <label for="keuzes">Region</label> <br />
                        <select id="keuzes" class="form-control" name="keuzes">
                        <?php 
                        
                        for( $i =0; $i<=19;$i++){
                            
                           print("<option value=".$i.">".$areas['meals'][$i]['strArea']."</option>"); 
                            
                        }

                    ?>
                        </select>
                        
                        </div>
                        <div class="container form-group">
                        <div class="row">
                             <div class="col-lg-6 col-sm-12">
                                <input type="submit" class="btnregis form-control" value="Go back" name="Goback" onclick="history.go(-1);" />
                             </div>
                             <div class="col-lg-6 col-sm-12">
                                <input type="submit" class="btnregis form-control" value="Save" name="Save" onclick="window.location.href='register.php'" />
                             </div>
                        </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
</body>
<script>
    var overeenpas = "<?php echo $overeenkomstpass; ?>";
    var userkort = "<?php echo $usertekort; ?>";
    var passkort = "<?php echo $passtekort; ?>";
    var bestaatal = "<?php echo $bestaatal; ?>";
    if(overeenpas==true){
      document.getElementById("fout").innerHTML += "passwords doesnt match <br>" ; //paswoords
    }
    else if(userkort==true){
    document.getElementById("fout").innerHTML += "username is to short, atleast 6 characters <br>" ; //user
    }
    else if(passkort==true){
    document.getElementById("fout").innerHTML += "password is to short, atleast 6 characters <br>" ;//user
    }
    else if(bestaatal==true){
    document.getElementById("fout").innerHTML += "This user already excist <br>" ;//user
    }
    else{
        document.getElementById("fout").innerHTML = "" ;//leeg
    }
    

    
</script>
</html>
