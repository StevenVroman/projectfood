<?php
//niet speciaals
setcookie("hungry","", time() - 3600, "/");
header("location:login.php");
exit;

?>