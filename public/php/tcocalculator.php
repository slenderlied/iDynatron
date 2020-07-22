<?php

include ("../database/mongodb.php");
session_start();
$usuario = $_SESSION["correo"];
$sumstorage = "0";
$fechafilter = $_GET["fecha"];
$idrandom = $_GET["idrandom"];
$i = 0;
$filter = [
    'Correo_usuario' => $usuario
    ];
    $query = new MongoDB\Driver\Query($filter);

$query1 = new MongoDB\Driver\Query([]);

$cursor2 = $manager->executeQuery($dbname4, $query1);


$cursor1 = $manager->executeQuery($dbname1, $query);

        // foreach($cursor1 as $row1){
        //    $fechavalidator = $row1 -> Fecha_Validator;
        //     $idvalidator = $row1 -> ID_Validator;

        //    if($fechafilter == $fechavalidator && $idrandom == $idvalidator ){
        //      $especificaciones = $row1 -> Especificaciones;

        //     foreach ($cursor2 as $key[$i]) {
        //         $nombrehardware = $key[$i] -> nombrehardware;
        //         $costohardware = $key[$i] -> selection2;
                
        //        if ($fechafilter == $fechavalidator && $idrandom == $idvalidator && $nombrehardware==$especificaciones) {
        //         $storageprocesador = $row1 -> Procesador;

        //         //  $especificaciones = $row1 -> Especificaciones;
        //          $resultado = substr( $especificaciones,35 );
        //          echo $resultado;
                
                 
        //        }

        //     }

        // }else{

        // }

        // }







$cursor = $manager->executeQuery($dbname2, $query);

        foreach($cursor as $row){
           $fechavalidator = $row -> Fecha_Validator;
        //    echo $fechavalidator;

           $storage = $row -> Storage;
        //    echo $storage;

           $storageprocesador = $row -> Procesador;
        //    echo $storageprocesador;

           $cantstorage = $row -> CantStorage;
           $sumstorage = $sumstorage + $cantstorage;
        //    echo $sumstorage;


           if($fechafilter == $fechavalidator){

            // echo "1";
            // echo "<br>";
        }else{

                // echo "2";
                // echo "<br>";
        }

        }

    // header("Location: /resultados?fecha=$fechafilter&idrandom=$idrandom");
     
                
        
?>