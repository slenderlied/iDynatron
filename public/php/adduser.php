<?php

include ("../database/mongodb.php");
date_default_timezone_set("America/Santiago");
$dt = new DateTime("now", new DateTimeZone('America/Santiago'));


$bulk = new MongoDB\Driver\BulkWrite;
$txtFoto=(($_FILES['txtFoto']["name"]));
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$contra = $_POST["contra"];
$org = $_POST["orga"];
$fecha = Date("d-m-Y");
$tiempo = Date("H:i:s");


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
        
       $holi= move_uploaded_file($tmpFoto,"../images/files/".$nombreArchivo);
        
    }

}else if($txtFoto==""){
    $txtFoto="usuarioperfil.jpg";
    $nombreArchivo=($txtFoto=="")?$_FILES["txtFoto"]["name"]:"usuarioperfil.jpg";
    error_reporting(error_reporting() & ~E_NOTICE);
    $tmpFoto= $_FILES["txtFoto"]["tmp_name"];
    echo "3";
    if($tmpFoto==""){
        
       $holi= move_uploaded_file($tmpFoto,"../images/files/".$nombreArchivo);
        
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
'fecha' => $fecha,
'tiempo' => $tiempo
];


try {
    
    $bulk->insert($user);
    
    $result = $manager->executeBulkWrite($dbname, $bulk);
    echo "Usuario Creado";

    
   header("Location: /login");

} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Error Encontrado: ".$e);
}


?>