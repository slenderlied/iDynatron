<?php
//Incluye el archivo mongodb.php de la carpeta database.
//mongodb.php trae la conexión a la base de datos iDynatron con la colección Usuarios
include ("../database/mongodb.php");

$bulk = new MongoDB\Driver\BulkWrite;

echo $correo = isset($_POST["txtCorreo"]);
//Variable

$a = "1";
$b = "2";
$c = "3";

$d = $a." , ".$b." , ".$c;
echo $d;
$e = "1 , 2 , 3";

if ($d == $e) {
   echo "hola";
}else {
   echo "chao";
}

// this is the query that will get all documents
$query = new MongoDB\Driver\Query([]);

// execute query and return a cursor that can iterate over the results
$cursor = $manager->executeQuery($dbname, $query);
$mensaje="";
foreach($cursor as $row){

 $correoregistro = $row -> correo;
 if($correo==$correoregistro){
   
    $mensaje = "<h5>Error cuenta</h5>";
 }else if($correo!=$row -> correo){


 }
}


echo $mensaje;



?>