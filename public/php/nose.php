<?php
include ("../database/mongodb.php");
session_start();



// $com = $dbname;

$document = $dbname->findOne(

['nombre' => 'Alejandro']

);
var_dump($document);



?>