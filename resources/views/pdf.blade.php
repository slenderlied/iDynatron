<?php
include ("database/mongodb.php");
include ("security/seguridadnologin.php");

$usuario = $_SESSION["correo"];

$filter = [
    'Correo_usuario' => $usuario
    ];
    $query = new MongoDB\Driver\Query($filter);

//$query = new MongoDB\Driver\Query([]);
$cursor1 = $manager->executeQuery($dbname1, $query);
$cursor = $manager->executeQuery($dbname2, $query);


echo $idrandom = $_GET["idrandom"];
echo "<br>";
echo $fechafilter = $_GET["fecha"];
echo "<br>";
//return redirect()->to('menu')->send();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe PDF <?php echo $fechafilter ?></title>
</head>
<body>    
    <h1>Hola soy un PDF</h1>
<h1><?php echo $_SESSION['nombre']  ?> <?php echo $_SESSION['apellido']?> </h1>

<?php
foreach($cursor1 as $row1){

    $id = $row1 -> ID_Validator;
    $fecha = $row1 -> Fecha_Validator;
    
    if($fechafilter == $fecha ){  
    echo $row1 -> ID_Validator;

    ?> <br><?php


 
}
}
foreach($cursor as $row){


}

?>

</body>
</html>