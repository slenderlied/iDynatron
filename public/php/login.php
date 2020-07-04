<?php
session_start();
include ("../database/mongodb.php");

$correo = $_POST["email"];
$contra = $_POST["pass"];

$contra1 = sha1($contra);

$filter = [
'correo' => $correo,
'contrasena' => $contra1
];
$query = new MongoDB\Driver\Query($filter);

try {
    $result = $manager->executeQuery($dbname, $query);
    $row = $result->toArray();
    $user = $row[0]->correo;
    $user1 = $row[0]->nombre;
    $user2 = $row[0]->apellido;
    $_SESSION['correo']=$user;
    $_SESSION['nombre']=$user1;
    $_SESSION['apellido']=$user2;
    $_SESSION['token']=md5(uniqid(mt_rand(),true));

  header("Location: /menu");

} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Error Encontrado: ".$e);
}


?>