<?php

include ("database/mongodb.php");
session_start();

$correo=$_SESSION['correo'];


$filter = [
    'correo' => $correo
    ];
    $query = new MongoDB\Driver\Query($filter);

//$query = new MongoDB\Driver\Query([]);

$cursor = $manager->executeQuery($dbname, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if(isset($_SESSION['correo'])){

        foreach($cursor as $row){
        
          ?>
          <table style="width:100%">
            
            <tr>
              <th>Usuario</th>
              <td><img class="img-thumbnail" width="100px" src="images/files/<?php echo $row -> foto ?>"> </td>
              <th></th>
              
            </tr>
            <tr>
              <td>Nombre: </td>
              <td><?php echo $row -> nombre ?></td>
            </tr>
            <tr>
              <td>Apellido</td>
              <td><?php echo $row -> apellido ?></td>
            </tr>
            <tr>
              <td>Correo</td>
              <td><?php echo $row -> correo ?></td>
            </tr>
            <tr>
              <td>Contraseña</td>
              <td><?php echo $row -> contrasena ?></td>
            </tr>
            <tr>
              <td>Organización</td>
              <td><?php echo $row -> organizacion ?></td>
            </tr>
            <tr>
              <td>Tipo Usuario</td>
              <td><?php echo $row -> tipoUsuario ?></td>
            </tr>
          </table>
          <br>
          <a href="login"> Cerrar Sesión</a>
        
          
<?php
        
}

}else{

echo ":c";

}
?><br>
</body>
</html>