<?php
include ("database/mongodb.php");
include ("security/seguridadnologin.php");

$correo=$_SESSION['correo'];
$filter = [
  'correo' => $correo
  ];

  $query1 = new MongoDB\Driver\Query($filter);
  $cursor1 = $manager1->executeQuery($dbname, $query1);

  foreach ($cursor1 as $row1) {
    $nombreusua = $row1 -> nombre;
    $apeusua = $row1 -> apellido;
    $correousua = $row1 -> correo;
    $orgausua = $row1 -> organizacion;
	$tipousua = $row1 -> tipoUsuario;
	$fotousu = $row1 -> foto;
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>iDynatron - Pefil Usuario</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="https://kit.fontawesome.com/5ef377022b.js" crossorigin="anonymous"></script>
</head>

<body>


<nav id="header" class="header pb-0">
    <div class="container text-center">
			<div class="row">
				<div class="col-md-12 text-center">
                <h1></h1>
					<ul class="ftco-footer-social p-0">
						<li class="ftco-animate"><a href="menu"><span class="icon-home"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fas fa-sign-out-alt"></span></a></li>
					</ul>
					
				</div>
			</div>
		</div>
	</nav>
	<!-- End Nav Section -->


    <div class="text text-center ftco-animate">
						<h1 class="logo "><span class="flaticon-camera-shutter"></span> DynaCloud</a></h1>
						<h1 class="mb-3"><i>Perfil Usuario</i></h1>
					</div>
					<div class=" text-center p-4 pb-5 mb-5 ftco-animate">
								<div class="user-img mb-5">
								<img src="images/files/<?php echo $fotousu ?>" style="width: 125px; height: 125px;" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
								</div>
	<!-- Start Contact Section -->
	<section class="ftco-section contact-section p-2" id="contact">
		<div class="container">

			<div class="row mb-5">
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-user-circle"></span>
						</div>
						<div>
							<h5 class="mb-4">Usuario</h5>
							<p style="font-size: 18px;"  ><?php echo $nombreusua ?> <?php echo $apeusua?></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="far fa-envelope"></span>
						</div>
						<div>
							<h5 class="mb-4">Correo Usuario</h5>
							<p style="font-size: 18px;"><?php echo $correousua ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="far fa-building"></span>
						</div>
						<div>     
							<h5 class="mb-4">Organización</h5>
							<p style="font-size: 18px;"><?php echo $orgausua ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="far fa-address-card"></span>
						</div>
						<div>
							<h5 class="mb-4">Tipo Cuenta</h5>
							<p style="font-size: 18px;"><?php echo $tipousua ?></p>
						</div>
					</div>
				</div>
			</div>

			<div class="row block-9">
				<div class="col-md-6 ftco-animate">
					<form action="#" class="contact-form p-4 p-md-5 py-md-5">
                    <div class="form-group">
					<p style="font-size: 10px;"  ></p>
                    <h2 class="mb-4 text-center"> <a href="/modificarusuario">Modificar Perfil</a> </h2>
					</div>
					</form>
				</div>

				
				<div class="col-md-6 ftco-animate">
					<form action="#" class="contact-form p-4 p-md-5 py-md-5">
                    <div class="form-group">
					<p style="font-size: 10px;"  ></p>	
                    <h2 class="mb-4 text-center">CLOUD</h2>
					</div>
						
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- End Contact Section -->


		

	<!-- Start Footer Section -->
	<footer class="ftco-footer py-5">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12 text-center">

					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> | Todos los Derechos Reservados |</p>

					<ul class="ftco-footer-social p-0">
						<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer Section -->


	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
	</script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
</body>

</html>