<?php include_once 'scripts/config.php';?>
<?php include_once 'scripts/api.php';
$categories = CallAPI("GET", $DB."/categories.php");
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
           <?php //print_r($categories);
           foreach ($categories as $categorie) {
            echo $categorie[0]['strCategory'];?>
            <img src="<?php echo $categorie[0]['strCategoryThumb']?>" alt="beef">
            <?php
            echo $categorie[1]['strCategory'];
            echo $categorie[2]['strCategory'];
        }
           ?>
 
</body>
</html>