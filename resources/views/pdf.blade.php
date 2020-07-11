<?php
include ("database/mongodb.php");
include ("security/seguridadnologin.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>    
    <h1>Hola soy un PDF</h1>
<h1><?php echo $_SESSION['nombre']  ?> <?php echo $_SESSION['apellido']?> </h1>
</body>
</html>