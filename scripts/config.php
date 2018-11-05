<?php
date_default_timezone_set( "Europe/Brussels" );


	$tmp = 'http://' . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
	$DB2  = substr( $tmp, 0, strripos( $tmp, "/" ) ) . "/scripts/DB_local.php";

	$DB = "https://www.themealdb.com/api/json/v1/1";

?>
