<?php


$procesadorservidor = $_POST["procesadorservidores"];
$coreservidores =  $_POST["coreservidores"];
$numeroservidores =  $_POST["numeroservidores"];
$memoriaservidores =  $_POST["memoriaservidores"];

$procesadorstorage =  $_POST["procesadorstorage"];
$corestorage =  $_POST["corestorage"];
$numerostorage =  $_POST["numerostorage"];
$memoriastorage =  $_POST["memoriastorage"];

$servidor = [

'_id' => new MongoDB\BSON\ObjectID,
'Procesador' => $procesadorservidor,
'Cores' => $coreservidores,
'nservidores' => $numeroservidores,
'memoria' => $memoriaservidores,
'correo_usuario' => "alejandrorojas@gmail.com"
];

$storage = [

'_id' => new MongoDB\BSON\ObjectID,
'Procesador' => $procesadorstorage,
'Cores' => $corestorage,
'nservidores' => $numerostorage,
'memoria' => $memoriastorage,
'correo_usuario' => "alejandrorojas@gmail.com"
];

try {
    


} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Error Encontrado: " .$e);
}


?>