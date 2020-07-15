<?php

include ("../database/mongodb.php");
session_start();
$usuario = $_SESSION["correo"];
$sumstorage = "0";
$fechafilter = $_GET["fecha"];
$consumoservidor= "8.33";
$consumohoras = "2.4";
$costoenergia = "133";

$filter = [
    'Correo_usuario' => $usuario
    ];
    $query = new MongoDB\Driver\Query($filter);

//$query = new MongoDB\Driver\Query([]);

$cursor = $manager->executeQuery($dbname2, $query);

        foreach($cursor as $row){
           $fechavalidator = $row -> Fecha_Validator;
           
           echo $fechavalidator;
           echo "<br>";
           echo "<br>";
           
           $storage = $row -> Storage;
           echo $storage;
           
           echo "<br>";
           echo "<br>";

           $storageprocesador = $row -> Procesador;
           echo $storageprocesador;

           echo "<br>";
           echo "<br>";

           $cantstorage = $row -> CantStorage;
           $sumstorage = $sumstorage + $cantstorage;
           echo $sumstorage;

           echo "<br>";
           echo "<br>";

           if($fechafilter == $fechavalidator){

            echo "1";
            echo "<br>";
        }else{

                echo "2";
                echo "<br>";
        }

        }
        echo "<br>";

        $consumoservidor= round($consumoservidor * $consumohoras);
        echo $consumoservidor;
        
        echo "<br>";
        $consumomensual = round($sumstorage * $consumoservidor);
        echo $consumomensual;
 
        echo "<br>";
        $consumototal = round($costoenergia * $consumomensual);
        echo $consumototal;

        // header("Location: /resultados?fecha=$fechafilter");
     
                
        
?>