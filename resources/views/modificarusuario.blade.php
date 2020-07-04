<?php

echo $boton=$_GET['btnModificar'];


$txtId = $_GET['txtId'];
$txtNombre = $_GET['txtNombre'];
$txtApellido = $_GET['txtApellido'];
$txtCorreo = $_GET['txtCorreo'];
$txtContra = $_GET['txtContra'];
$txtOrganizacion = $_GET['txtOrganizacion'];
$txtFoto = $_GET['txtFoto'];
$txtTipoUsuario = $_GET['txtTipoUsuario'];
$txtFecha = $_GET['txtFecha'];
$txtTiempo = $_GET['txtTiempo'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Modificar Usuario | iDynatron</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/css/util.css">
	<link rel="stylesheet" type="text/css" href="css/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="/php/modifyuser.php" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-26">
						Modificar Usuario
					</span>

                    <div class="wrap-input100">
						<input class="input100" id="txtFoto" accept="image/*" type="file" name="txtFoto" value="<?php echo $txtFoto?>">					
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Formato valido: a@b.c">
                    <a style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 23px; color: #999999; line-height: 1.2;">Nombre</a> 
						<input class="input100" type="text" name="txtNombre" value="<?php echo $txtNombre ?>" >
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Formato valido: a@b.c">
                    <a style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 23px; color: #999999; line-height: 1.2;">Apellido</a>
                        <input class="input100" type="text" name="txtApellido" value="<?php echo $txtApellido ?>">
                        <span class="focus-input100"></span>
                        
					</div>
                     
                    <div class="wrap-input100 validate-input" data-validate = "Formato valido: a@b.c">
                    <a style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 23px; color: #999999; line-height: 1.2;">Correo Electrónico </a> 
						<input class="input100" type="text" name="txtCorreo" value="<?php echo $txtCorreo ?>">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Formato valido: a@b.c">
                    <a style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 23px; color: #999999; line-height: 1.2;">Organización</a> 
						<input class="input100" type="text" name="txtOrganizacion" value="<?php echo $txtOrganizacion ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
							Modificar Cuenta
							</button>
						</div>
					</div>
								<input type="hidden" name="txtId" value="<?php echo $txtId ?>">			       
                                <input type="hidden" name="txtContra" value="<?php echo $txtContra ?>">
								<input type="hidden" name="txtFoto1" value="<?php echo $txtFoto ?>">
                                <input type="hidden" name="txtTipoUsuario" value="<?php echo $txtTipoUsuario ?>">
								<input type="hidden" name="txtFecha" value="<?php echo $txtFecha ?>">
								<input type="hidden" name="txtTiempo" value="<?php echo $txtTiempo ?>">
				</form>
			</div>
		</div>
	</div>
	

        



	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/js/main.js"></script>

</body>
</html>