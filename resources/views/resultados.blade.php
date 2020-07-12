<?php
include ("database/mongodb.php");
include ("security/seguridadnologin.php");

//return redirect()->to('menu')->send();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<body>

<a href="/pdf">Ver Informe PDF</a>
<br><br><br>


<!-- partial:index.partial.html -->
<form action="/php/prueba.php" method="post">
<input type="button" id="add_field" value="adicionar">
<br>
<div id="listas">
    <div><input type="number" name="campo[]"></div>
</div>
<br>
<input type="submit" value="Hola">

</form>




<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/js/validator.js"></script>


</body>
</html>