<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="php/adduser.php" method="post" enctype="multipart/form-data">
<input id="txtFoto" accept="image/*" type="file" name="txtFoto"><br>
Primer Nombre: <input type="text" name="nombre"><br>
Primer Apellido: <input type="text" name="apellido"><br>
Correo: <input type="text" name="correo"><br>
Contraseña: <input type="text" name="contra"><br>
Organización: <input type="text" name="orga"><br>
<input type="submit" value="Crear">


</form>
</body>
</html>