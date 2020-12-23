<?php
//Incluye el archivo mongodb.php de la carpeta database.
//mongodb.php trae la conexión a la base de datos iDynatron con la colección Usuarios
include ("../database/mongodb.php");

//Se define la zona horaria America/Santiago
date_default_timezone_set("America/Santiago");
//Variable para almacenar la hora actual    
$dt = new DateTime("now", new DateTimeZone('America/Santiago'));

//Variable 
$bulk = new MongoDB\Driver\BulkWrite;
//Variable
$txtFoto=(($_FILES['txtFoto']["name"]));
//Variable
$nombre = $_POST["txtNombre"];
//Variable
$apellido = $_POST["txtApellido"];
//Variable
$correo = $_POST["txtCorreo"];
//Variable
$contra = $_POST["txtContra"];
//Variable
$org = $_POST["txtOrganizacion"];
//Variable
$fecha = Date("d-m-Y");
//Variable
$tiempo = Date("H:i:s");

// this is the query that will get all documents
$query = new MongoDB\Driver\Query([]);

// execute query and return a cursor that can iterate over the results
$cursor = $manager->executeQuery($dbname, $query);
foreach($cursor as $row){}


echo $txtFoto;

//$contra1 = password_hash($contra,PASSWORD_BCRYPT,array("cost"=>12));

$contra1= sha1($contra);

echo $contra1;

$archivo=($txtFoto=="")?$_FILES["txtFoto"]["name"]:"usuario.jpg";

if($txtFoto!=""){
    $nombreArchivo=($txtFoto!="")?$_FILES["txtFoto"]["name"]:"usuario.jpg";
    error_reporting(error_reporting() & ~E_NOTICE);
    $tmpFoto= $_FILES["txtFoto"]["tmp_name"];
   echo "2";
    if($tmpFoto!=""){
       $imagen= move_uploaded_file($tmpFoto,"../images/files/".$nombreArchivo);
    }
}else if($txtFoto==""){
    $txtFoto="usuarioperfil.jpg";
    $nombreArchivo=($txtFoto=="")?$_FILES["txtFoto"]["name"]:"usuarioperfil.jpg";
    error_reporting(error_reporting() & ~E_NOTICE);
    $tmpFoto= $_FILES["txtFoto"]["tmp_name"];
    echo "3";
    if($tmpFoto==""){
        
       $imagen= move_uploaded_file($tmpFoto,"../images/files/".$nombreArchivo);
        
    }

}


$user = [

'_id' => new MongoDB\BSON\ObjectID,
'nombre' => $nombre,
'apellido' => $apellido,
'correo' => $correo,
'contrasena' => $contra1,
'organizacion' => $org,
'foto' => $nombreArchivo,
'tipoUsuario' => "Standard",
'estado' => "2",
'fecha' => $fecha,
'tiempo' => $tiempo
];


try {
    
     if($correo==$row -> correo){
   

      $cliente = "Cliente creado";
      $cuenta = "Cuenta ya registrada";
      header("Location: /register?clientecreado=$cliente");

     }else if($correo!=$row -> correo){

        $bulk->insert($user);
    
        $result = $manager->executeBulkWrite($dbname, $bulk);
        echo "Usuario Creado";
        $destino = $correo;
		$desde = "From:"."alejandro.ry98@gmail.cl";
		$asunto = "Hola";
		$mensaje = "Creación de cuenta";
		mail($destino,$asunto,$mensaje,$desde);
          
       header("Location: /login");

     }

} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Error Encontrado: ".$e);
}


?>