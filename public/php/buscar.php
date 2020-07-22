<?php
include ("../database/mongodb.php");
session_start();

$salida="";


$query = new MongoDB\Driver\Query([]);
// execute query and return a cursor that can iterate over the results
// $cursor1 = $dbname->find();

$cursor = $manager->executeQuery($dbname, $query);
$cursor1 = $manager->executeQuery($dbname, $query);
$xD=iterator_to_array($cursor);




foreach ($cursor1 as $row){
          
  echo $row -> nombre;

  if (isset($_POST['consulta'])) {  
    //  echo $_POST['consulta'];
     $q = $_POST['consulta'];
    
     if ($xD > 0) {
    
            foreach ($xD as $row1) {
              
            $s = $row1 -> nombre;
    
            if ($q == $s) {
                echo  $s;
    
              }
        
            }
    
    }
    
    }

  }



// $jokesArray = iterator_to_array($cursor);
// $query = (count($jokesArray));
// echo "1";

// if ($jokesArray  > 0) {
  
//          $salida = "<table class='tabla_datos'> 
//     <thead>
//     <tr>
//     <td>Nombre</td>
//     <td>Apellido</td>
//     </tr>
//     </thead>
//     <tbody>";

//         foreach ($jokesArray as $row) {

//             $salida.="<tr>
//             <td>".$row -> nombre ."</td>
//             <td>".$row -> apellido ."</td>
//             </tr>
//             ";

//      }

// }else{

// $salida.="No hay datos :c";

// }


// echo $salida;





?>