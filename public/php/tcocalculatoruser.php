<?php
include ("../database/mongodb.php");
session_start();
$usuario = $_SESSION["correo"];

$hardware = $_POST["nombrehardware"];

$idrandom = rand(1, 999999);
date_default_timezone_set("America/Santiago");
$dt = new DateTime("now", new DateTimeZone('America/Santiago'));
$fecha = Date("d-m-Y-H:i");

$query = new MongoDB\Driver\Query([]);

// Costo Personal TI  \\
$horasaño = "40";
$personal = "23";
$costopersonal = $horasaño * $personal;
echo $costopersonal;
// Horas al año -> 40 || Costo personal TI por hora -> 23 \\

// Hardware 
$porc = "1.20";
$cursor = $manager->executeQuery($dbname4, $query);

foreach ($cursor as $row ) {
    
   $nombrehardware = $row -> nombrehardware;
   
   if ($hardware==$nombrehardware) {
     $costohardware = $row -> selection2;
    echo "<br>";
   $costohardwaretotal = round($costohardware * $porc);
   echo $costohardwaretotal;
  
}
}
//--\\

// Software
$software = substr($hardware,13,-35);
$software;

$cursor1 = $manager->executeQuery($dbname5, $query);
 
foreach ($cursor1 as $soft ) {
      $nucleosoftware = $soft -> nucleo;
    if ($software == $nucleosoftware) {
      echo "<br>";
      $valornucleo = $soft -> costonucloe;
     echo $costosoftaretotal = $valornucleo;
}
}
//--\\

// Electricidad 
$cursor2 = $manager->executeQuery($dbname3, $query);
$precioelectricidad = "0.133";

foreach ($cursor2 as $electri ) {
    
   $hardwareconsumo = $electri -> hardwareconsumo;
   
   if ($hardware==$hardwareconsumo) {
   echo "<br>";
   $consumowatt = $electri -> consumowatt;
   $consumototalwatt = $precioelectricidad + $consumowatt;
   echo $consumototalwatt;
}
}
//--\\

// Redes
echo "<br>";
echo $costototalhardsoft = $costohardwaretotal + $costosoftaretotal;
echo "<br>";
$porcredes = "1.15";
echo $totalredes = round($costototalhardsoft * $porcredes);
echo "<br>";
//--\\

//Mantención redes
echo $manteredes = round($totalredes*$porcredes);
//--\\

// Suma total \\
echo "<br>";
echo $sumatotalfinal = round($costopersonal + $costohardwaretotal + $consumototalwatt + $totalredes + $manteredes);
echo "<br>";
echo $sumatotalfinalaños = $sumatotalfinal * 5;
//--\\
echo "<br>";

// Cloud \\
$cursor3 = $manager->executeQuery($dbname6, $query);
$maquinarandom = rand(1, 8);
$horasmes = "730";
$i= 0;

foreach ($cursor3 as $maquina ) {
    
    if ($maquinarandom == $i) {
      $nombremaquina = $maquina -> nombrevirtualmachine;
     echo "<br>";
    $costoporhora = str_replace(',','.',$maquina -> usoporhora); 
    }
    $i = $i + 1;
}

echo $cloudproducto = round($horasmes * $costoporhora);
echo "<br>";
//--\\

// Costo Personal Cloud  \\
$horasañocloud = "16.67";
$personalcloud = "23";
$costopersonalcloud = round($horasañocloud * $personalcloud);
echo $costopersonalcloud;
//--\\

// Costo Almacenamiento \\
// Costo Storage \\
$cursor4 = $manager->executeQuery($dbname7, $query);
$standard = "Standard Storage";
$volumegb = "512";
foreach ($cursor4 as $stora) {
    $nombrest = $stora -> nombrestorage;
    $nombrestora = substr($nombrest,0, 16);
    if ($standard == $nombrestora) {
        $preciostorage = $stora -> preciostorage;
    }
}
echo "<br>";
echo $precioalmacenamiento= round($volumegb * $preciostorage);
//--\\

// Costo Red \\
$cursor5 = $manager->executeQuery($dbname8, $query);
$usomensualstandard = "0-1";
$redusodigitada = "1024";
foreach ($cursor5 as $red) {
    $usomensual = $red -> usoMensual;
    if ($usomensualstandard == $usomensual) {
        $preciored =  str_replace(',','.',$red -> precioRed);
       echo "<br>";
       echo $precioredalmacenamiento = round(($precioalmacenamiento)+($redusodigitada*$preciored));
    }
}
//--\\

// // Costo Operaciones \\
// $cursor6 = $manager->executeQuery($dbname9, $query);
// $standardOpera = "Standard Storage";
// foreach ($cursor6 as $opera) {
//     $clasedealmacenamiento = $opera -> claseDeAlmacenamiento;
//     if ($standardOpera == $clasedealmacenamiento) {
//        $operacionA = $opera -> operacionesClaseA;
//        $operacionB = $opera -> operacionesClaseB;
//     }

// }
// //--\\

    try {

        $storage= [
            '_id' => new MongoDB\BSON\ObjectID,
            'Correo_usuario' => $usuario,
            'Fecha_Validator' =>$fecha,
            'ID_Validator' =>$idrandom,
            'CantStorage' =>$cantstorage,
            'Storage' => $storageid,
            'Procesador' => $procesadorstorage,
            'Cores' => $corestorage,
            'nservidores' => $numerostorage,
            'memoria' => $memoriastorage
            ];

          $bulk->insert($storage);              
          $result = $manager1->executeBulkWrite($dbname10, $bulk);
   } catch (MongoDB\Driver\Exception\Exception $e) {
       die("Error Encontrado: ".$e);
   }
//-------------------------------------------------\\
?>