<?php
include ("../database/mongodb.php");
session_start();

$salida="";

// this is the query that will get all documents
$query = new MongoDB\Driver\Query([]);

// execute query and return a cursor that can iterate over the results
$cursor = $manager->executeQuery($dbname, $query);


echo "hola";
if (isset($_POST['consulta'])) {
   

    $salida = "<table class='tabla_datos'> 
    <thead>
    <tr>
    <td>Nombre</td>
    <td>Apellido</td>
    </tr>
    </thead>
    <tbody>";


        foreach ($cursor as $row) {
         
        $salida.="<tr>
        <td>".$row -> nombre ."</td>
        <td>".$row -> apellido ."</td>
        </tr>
        ";

        }
   $salida.="</tbody></table>";
}else{
$salida.="No hay datos :c";

}


echo $salida;







?>