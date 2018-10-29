<?php
include_once('scripts/config.php');
include_once('scripts/api.php');
$get_data = callAPI('GET',$DB.'/categories.php/idCategory', false);
$response = json_decode($get_data, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <ul>
            <?php
               print($response);
            ?>
        </ul>  
</body>
</html>