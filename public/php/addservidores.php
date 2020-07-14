<?php

include ("../database/mongodb.php");
session_start();
$usuario = $_SESSION["correo"];

echo $idrandom = rand(1, 99999);

$bulk = new MongoDB\Driver\BulkWrite;

$servidorid = "SER00";
$procesadorservidor = $_POST["servidorprocesador"];
$coreservidores =  $_POST["coreservidor"];
$numeroservidores =  $_POST["numeroservidor"];
$memoriaservidores =  $_POST["memoriaservidor"];

$bulk1 = new MongoDB\Driver\BulkWrite;

$storageid = "STR00";
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
    $servidor[$i] = [

        '_id' => new MongoDB\BSON\ObjectID,
        'Correo_usuario' => $usuario,
        'Servidor' => $servidorid,
        'Procesador' => $procesadorservidor[$i],
        'Cores' => $coreservidores[$i],
        'nservidores' => $numeroservidores[$i],
        'memoria' => $memoriaservidores[$i]
        ];
    
            $bulk->insert($servidor[$i]);
        
}
$result = $manager->executeBulkWrite($dbname1, $bulk);

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

?>