<?php include_once 'scripts/config.php';?>
<?php include_once 'scripts/api.php'; 
$cookie_name = "hungry";

if(!isset($_COOKIE[$cookie_name])) { // terug sturen als cookie niet bestaat
    header("location: login.php");   
}
$account = $_COOKIE[$cookie_name];

$areas = CallAPI("GET", $DB."/list.php?a=list");
$userprofile = CallAPI("GET", $DB2."/tblusers");

foreach($userprofile as $profile){
    if($account == $profile["Username"]){
       $iduser = $profile["ID"];
    }    
}
$userprofile2 = CallAPI("GET", $DB2."/tblusers/".$iduser);
$overeenkomstpass = false;
$usertekort = false;
$passtekort= false;
$bestaatal=false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filledinpass=$_POST['pass'];
    $filledinpass2=$_POST['pass2'];
    if (isset($_POST['Save'])) {
        //check als 4 velden ingevuld zij
        if(!$_POST['pass']== ""){
                if(strlen($filledinpass)<=5){$passtekort = true; //fout
                }
                 else{ $passtekort = false;
                }
                if($filledinpass == $filledinpass2){   
                     $overeenkomstpass=false;
                }
                else{
                     $overeenkomstpass=true; //fout
                }
        }
        if($overeenkomstpass == false && $passtekort==false){
            //ga door
            $user2 = array();
            $user2["Username"]=$_POST['login'];
            if(!$_POST['Pass']== ""){
                $user2["Pass"]= md5($_POST['Pass']);
            }
            else{
                $user2["Pass"]=$userprofile2["Pass"];
            }
            $user2["FavFood"]=$_POST['keuzes'];
            $result = CallAPI("PUT", $DB2."/tblusers/".$userprofile2["ID"],json_encode($user2)); // goed
                header("location: home.php");

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
                    <form action ="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="profileform">
                        <div class="form-group">
                        <label for="user"> Username</label>
                            <input type="text" class="form-control" placeholder="Username" value="<?php echo $userprofile2["Username"] ?>" required name="login" id="user" readonly/>
                        </div>
                        <div class="form-group">
                        <label for="pass">New Password</label>
                            <input type="password" class="form-control" placeholder="Password" value="" name="pass" id = "pass" />
                        </div>
                        <div class="form-group">
                        <label for="pass">Retype new password</label>
                            <input type="password" class="form-control" placeholder="Password" value="" name="pass2" id = "pass2" />
                        </div>
                        <div class="form-group">
                        <label for="keuzes">Region</label> <br />
                        <select id="keuzes" class="form-control" name="keuzes">
                        <?php 
                        
                        for( $i =0; $i<=19;$i++){
                            if($i == $userprofile2["FavFood"]){
                                print("<option value=".$i." selected>".$areas['meals'][$i]['strArea']."</option>");
                            }
                            else{
                                print("<option value=".$i.">".$areas['meals'][$i]['strArea']."</option>"); 
                            }
                           
                            
                        }

                    ?>
                        </select>
                        
                        </div>
                        <div class="container form-group">
                        <div class="row">
                             <div class="col-lg-12 col-sm-12">
                                <input type="submit" class="btnregis form-control" value="Save" name="Save" />
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
