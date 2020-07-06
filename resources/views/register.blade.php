<?php

include ("security/seguridadlogin.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>iDynatron</title>
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
				<form class="login100-form validate-form" action="/php/adduser.php" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-26">
						Crear Usuario
					</span>

                    <div class="wrap-input100">
						<input class="input100" id="txtFoto" accept="image/*" type="file" name="txtFoto">					
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Formato valido: a@b.c">
						<input class="input100" type="text" name="txtNombre" minlength="8" maxlength="20">
						<span class="focus-input100" data-placeholder="Nombre"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Formato valido: a@b.c">
						<input class="input100" type="text" name="txtApellido">
						<span class="focus-input100" data-placeholder="Apellido"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Formato valido: a@b.c">
						<input class="input100" type="text" name="txtCorreo">
						<span class="focus-input100" data-placeholder="Correo Electrónico"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Formato valido: a@b.c">
						<input class="input100" type="text" name="txtOrganizacion">
						<span class="focus-input100" data-placeholder="Organización"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresar contraseña">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="txtContra">
						<span class="focus-input100" data-placeholder="Contraseña"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate="Contraseñas ">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="Confircontra">
						<span class="focus-input100" data-placeholder="Confirmar contraseña"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="botoncrearcuenta"  value="btnAgregar" type="submit">
							Crear Cuenta
							</button>
						</div>
					</div>

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
<!--===============================================================================================-->
    
</body>
</html>