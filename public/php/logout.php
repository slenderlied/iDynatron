<?php
session_start();
include ("../connection/mongodb.php");

session_start();

	
session_destroy();
header("Location: /login");



?>

