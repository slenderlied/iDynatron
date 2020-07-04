<?php

include ("../database/mongodb.php");

$bulk = new MongoDB\Driver\BulkWrite;

$id = $_POST["txtId"];
$nombre = $_POST["txtNombre"];
$apellido = $_POST["txtApellido"];
$correo = $_POST["txtCorreo"];
$contra = $_POST["txtContra"];
$org = $_POST["txtOrganizacion"];
$tipousu = $_POST["txtTipoUsuario"];
$fecha = $_POST['txtFecha'];
$tiempo = $_POST['txtTiempo'];
$txtFoto=(($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";
$txtFoto1 = $_POST["txtFoto1"];

echo $txtFoto1;

if($txtFoto!=""){
    $nombreArchivo=($txtFoto!="")?$_FILES["txtFoto"]["name"]:"usuario.jpg";
    error_reporting(error_reporting() & ~E_NOTICE);
    $tmpFoto= $_FILES["txtFoto"]["tmp_name"];
   echo "2";
    if($tmpFoto!=""){
        
       $holi= move_uploaded_file($tmpFoto,"../images/files/".$nombreArchivo);
        
    }

}else if($txtFoto==""){
    $txtFoto = $txtFoto1;
    echo $txtFoto;
    $nombreArchivo=$txtFoto1;
    error_reporting(error_reporting() & ~E_NOTICE);
    $tmpFoto= $_FILES["txtFoto1"]["tmp_name"];
    echo "3";
    if($tmpFoto==""){
        
       $holi= move_uploaded_file($tmpFoto,"../images/files/".$nombreArchivo);
        
    }

}
try{
    
    $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id)],
    ['nombre' => $nombre,
    'apellido' => $apellido,
    'correo' => $correo,
    'contrasena' => $contra,
    'organizacion' => $org,
    'foto' => $nombreArchivo,
    'tipoUsuario' => $tipousu,
    'fecha' => $fecha,
    'tiempo' => $tiempo
    ]);

    echo $nombreArchivo;
    $result = $manager->executeBulkWrite($dbname, $bulk);
    echo "Usuario Modificado";

    header("Location: /perfilusuario");

} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Error Encontrado: "+$e);
}



?>