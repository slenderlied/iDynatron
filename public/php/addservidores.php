<?php

include ("../database/mongodb.php");
session_start();
$usuario = $_SESSION["correo"];

echo $idrandom = rand(1, 999999);

//Se define la zona horaria America/Santiago
date_default_timezone_set("America/Santiago");
//Variable para almacenar la hora actual    
$dt = new DateTime("now", new DateTimeZone('America/Santiago'));
echo "<br>";
//Variable
echo $fecha = Date("d-m-Y-H:i");


$bulk = new MongoDB\Driver\BulkWrite;

$servidorid = "SER00";
$cantservidor = "1";
$procesadorservidor = $_POST["servidorprocesador"];
$coreservidores =  $_POST["coreservidor"];
$numeroservidores =  $_POST["numeroservidor"];
$memoriaservidores =  $_POST["memoriaservidor"];

$bulk1 = new MongoDB\Driver\BulkWrite;

$storageid = "STR00";
$cantstorage = "1";
$procesadorstorage =  $_POST["procesadorstorage"];
$corestorage =  $_POST["corestorage"];
$numerostorage =  $_POST["numerostorage"];
$memoriastorage =  $_POST["memoriastorage"];

for ($i=0; $i <sizeof($procesadorservidor) && $i <sizeof($coreservidores) && $i <sizeof($numeroservidores) && $i <sizeof($memoriaservidores); $i++) {
    echo $usuario;
    echo " servidor: ";
    ++$servidorid;
    echo $servidorid;
    echo "<br>";
    echo $procesadorservidor[$i];
    echo $coreservidores[$i];
    echo $numeroservidores[$i];
    echo $memoriaservidores[$i];
    echo "<br>";
    //echo $idrandom;
    echo "<br>";

    $servidor = [
        '_id' => new MongoDB\BSON\ObjectID,
        'Correo_usuario' => $usuario,
        'Fecha_Validator' =>$fecha,
        'ID_Validator' =>$idrandom,
        'CantServidor' => $cantservidor,
        'Servidor' => $servidorid,
        'Procesador' => $procesadorservidor[$i],
        'Cores' => $coreservidores[$i],
        'nservidores' => $numeroservidores[$i],
        'memoria' => $memoriaservidores[$i]
        ];
    
          $bulk->insert($servidor);
        
}
$result = $manager->executeBulkWrite($dbname1, $bulk);

echo $calculo= "833"*"131";

for ($i=0; $i <sizeof($procesadorstorage) && $i <sizeof($corestorage) && $i <sizeof($numerostorage) && $i <sizeof($memoriastorage); $i++) { 
    echo $usuario;
    echo " storage: ";
    ++$storageid;
    echo $storageid;
    echo "<br>";
    echo $procesadorstorage[$i];
    echo $corestorage[$i];
    echo $numerostorage[$i];
    echo $memoriastorage[$i];
    echo "<br>";

   

    $storage= [

        '_id' => new MongoDB\BSON\ObjectID,
        'Correo_usuario' => $usuario,
        'Fecha_Validator' =>$fecha,
        'CantStorage' =>$cantstorage,
        'Storage' => $storageid,
        'Procesador' => $procesadorstorage[$i],
        'Cores' => $corestorage[$i],
        'nservidores' => $numerostorage[$i],
        'memoria' => $memoriastorage[$i]
        ];

        try {
    
              $bulk1->insert($storage);              
        
       } catch (MongoDB\Driver\Exception\Exception $e) {
           die("Error Encontrado: ".$e);
       }
}

$result = $manager1->executeBulkWrite($dbname2, $bulk1);

header("Location: /php/tcocalculator.php?fecha=$fecha&idrandom=$idrandom");


?>