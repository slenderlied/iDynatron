<?php

include ("database/mongodb.php");
include ("security/seguridadnologin.php");

//return redirect()->to('menu')->send();

$query = new MongoDB\Driver\Query([]);
$cursor = $manager->executeQuery($dbname4, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>iDynatron - TCO</title>
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
                        <li class="ftco-animate"><a href="perfilusuario"><span class="icon-user-circle"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="flaticon-camera-shutter"></span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- End Nav Section -->
    <div class="text text-center ftco-animate">
						<h1 class="logo "><span class="flaticon-camera-shutter"></span> DynaCloud</a></h1>
						<h1 class="mb-3"><i>TCO - Consulta Gastos</i></h1>
					</div>

    <form action="php/tcocalculatoruser.php" method="post">
	 	<!-- Start Services Section -->
	<section id="services" class="ftco-section pb-1 p-0">
		<div class="container">
			<div class="row">
				<div class="col-md-9 ">
					<div class="row">
						<div class="col-md-5 heading-section ftco-animate pb-1">
							<h1 class="mb-4">Servidores</h1>
							<h2 class="mb-4" style="font-size: 20px;">Servidor</h2>
						</div>
                    </div>
                    
					<div class="row">
						<div class="col-md-6">
							<div class="media block-4 services d-block ftco-animate">
                                <div class="media-body">
                                <select class="form-control form-control-lg" name="nombrehardware">
                    <?php  foreach ($cursor as $row) { ?>
                    <option value="<?php echo $row -> nombrehardware; ?>" name="nombrehardware" >
                    <?php echo $row -> nombrehardware; ?>
                    </option>
                    <?php } ?>
                     </select>
								</div>
							</div>
                        </div>
                        
						<div class="row">
						<div class="col-md-6">
							<div class="media block-4 services d-block ftco-animate">
                                <div class="media-body">
								<input type="button" value="Agregar" class="btn btn-primary py-3 px-5" id="add_field" >
								</div>
							</div>
                        </div>


								</div>
							</div>
                        </div>
                    </div>
                        
				</div>
			</div>
	</section>
    <!-- End Services Section -->
    

<!-- Start Services Section -->
<section id="services" class="ftco-section pb-0 p-8 ">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-5 heading-section ftco-animate pb-0">
							<h1 class="mb-4">Costos (CLP)</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="media block-6 services d-block ftco-animate">
								<div class="icon"></div>
								<div class="media-body">
									<h4 class="heading mb-3">Electricidad</h4>
									<h4 class="heading mb-3">$131</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="media block-6 services d-block ftco-animate">
								<div class="icon"></span></div>
								<div class="media-body">
									<h4 class="heading mb-3">Almacenamiento</h4>
                                    <h4 class="heading mb-3">$131</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="media block-6 services d-block ftco-animate">
								<div class="icon"></span></div>
								<div class="media-body">
									<h4 class="heading mb-3">Personal de TI</h4>
                                    <h4 class="heading mb-3">$3.317</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
			</div>
		</div>
	</section>
	<!-- End Services Section -->





    <div class="form-group text-center mt-3 pb-0 ftco-animate">
	  <form action="/cloudinformacion">
		<input type="submit" value="Calcular" class="btn btn-primary py-3 px-5">
      </form>	
    </div>
    
</form>

	<!-- Start Footer Section -->
	<footer class="ftco-footer py-5 ftco-animate">
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

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/js/servidores.js"></script>
  <script src="js/js/servidores1.js"></script>

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