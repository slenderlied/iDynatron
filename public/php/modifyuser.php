<?php

include ("../database/mongodb.php");

$bulk = new MongoDB\Driver\BulkWrite;
$id = $_POST["txtId"];
$txtFoto = $_POST["txtFoto"];
$nombre = $_POST["txtNombre"];
$apellido = $_POST["txtApellido"];
$correo = $_POST["txtCorreo"];
$contra = $_POST["txtContra"];
$org = $_POST["txtOrganizacion"];
$fecha = $_POST['txtFecha'];
$tiempo = $_POST['txtTiempo'];


echo $id;





?>