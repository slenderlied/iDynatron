<?php
include ("database/mongodb.php");
include ("security/seguridadnologin.php");
 $fechafilter = $_GET["fecha"];
 $idrandom = $_GET["idrandom"];
$correo=$_SESSION['correo'];
$dolar= 800;
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

  }




  $query = new MongoDB\Driver\Query([]);

  $cursor = $manager->executeQuery($dbname10, $query);

  
    foreach($cursor as $row){
   $idvalidator = $row -> Id_Validator;
   $fechavalidator = $row -> Fecha_Validator;
   $correovalidator = $row -> Correo_Usuario;
  if ($idrandom == $idvalidator && $fechafilter == $fechavalidator && $correo == $correovalidator) {
    //On Premise\\ 
  $costopersonalti = $row -> Costo_Personal_TI_Premise;
  $hardpremi = $row -> Hardware_Premise;
  $softpremi = $row -> Software_Premise;
  $elecpremi = $row -> Electricidad_Premise;
  $redepremi = $row -> Redes_Premise;
  $manteremi = $row -> Mantencion_Redes_Premise;
  $sumtotmes = $row -> Suma_Total_Premise;
  $sumtotcin = $row -> Suma_Total_Premise_5;
  //--\\
 

  //Cloud\\
  $sumcloud = $row -> Suma_Total_Cloud;

  //--\\
  //Conversión Precio Dolar a Pesos Chilenos\\
  //On Premise\\ 
  $clpsumtotmes= $sumtotmes*$dolar;


  //--\\
  //Cloud\\

  $clpsumcloud= $sumcloud*$dolar;

  //--\\

  //Consultas Cloud - On Premise\\
  $dif1 = (($clpsumtotmes - $clpsumcloud)/100) ;
  //--\\

}
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>DynaCloud - Resultados Consulta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="images/AT-pro-logo.png"/>
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
                        <li class="ftco-animate"><a href="#"><span class="fas fa-sign-out-alt"></span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- End Nav Section -->
    <div class="text text-center ftco-animate">
						<h1 class="logo "><span class="flaticon-camera-shutter"></span> DynaCloud</a></h1>
						<h1 class="mb-3"><i>Resultado Servidores</i></h1>
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
                    <h2 class="mb-4 text-center">ON-PREMISE</h2>
					</div>
						<div class="form-group">
                        <p style="font-size: 20px;">Gasto Total: $<?php echo number_format($clpsumtotmes, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Total: $<?php echo number_format($clpsumtotmes, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Total: $<?php echo number_format($clpsumtotmes, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Total: $<?php echo number_format($clpsumtotmes, 0, ",", ".");  ?></p>
						</div>
					</form>
				</div>

				<div class="col-md-6 ftco-animate">
					<form action="#" class="contact-form p-4 p-md-5 py-md-5">
                    <div class="form-group">
                    <h2 class="mb-4 text-center">CLOUD</h2>
					</div>
						<div class="form-group">
                        <p style="font-size: 20px;">Gasto Total: $<?php echo number_format($clpsumcloud, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Total: $<?php echo number_format($clpsumtotmes, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Total: $<?php echo number_format($clpsumtotmes, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Total: $<?php echo number_format($clpsumtotmes, 0, ",", ".");  ?></p>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- End Contact Section -->



     
	  <div class="form-group text-center mt-4">
	  <form action="/cloudinformacion">
		<input type="submit" value="Ver Más" class="btn btn-primary py-3 px-5">
      </form>	
	</div>
	 



    <div id="notices">
        <div>Informe:</div>
        <div class="notice">
          <form action="/pdf" method="get">   
          <?php echo "<button type='input' class='btn btn-outline-dark'>Ver Informe PDF</button>";?> 
          <input type="hidden" name="fecha" value="<?php echo $fechafilter  ?>">
		  <input type="hidden" name="idrandom" value="<?php echo $idrandom  ?>">

          </form> 
        </div>
      </div>



	  <div id="notices">
        <div>Dashboard:</div>
        <div class="notice">
          <form action="/dashboard" method="get">   
          <?php echo "<button type='input' class='btn btn-outline-dark'>Ver Dashboard</button>";?> 
          <input type="hidden" name="fecha" value="<?php echo $fechafilter ?>">
          </form> 
        </div>
      </div>


	<!-- Start Services Section -->
	<section id="services" class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-5 heading-section ftco-animate pb-5">
							<h2 class="mb-4">Servicios Cloud</h2>
							<p>Empresas de todos los sectores y de distintos tamaños apuestan cada día con mayor
								decisión por el Cloud</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="media block-6 services d-block ftco-animate">
								<div class="icon"><span class="fas fa-cloud"></span></div>
								<div class="media-body">
									<h3 class="heading mb-3">Menor coste y mayor rentabilidad.</h3>
									<p> Invertir en la compra de equipos y centros de datos es cosa del pasado. El Cloud
										Computing es más rentable porque las empresas ya no deben gastar grandes
										cantidades de dinero en la puesta en marcha de un centro de datos.
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="media block-6 services d-block ftco-animate">
								<div class="icon"><span class="fas fa-cloud-download-alt"></span></div>
								<div class="media-body">
									<h3 class="heading mb-3">Adiós al mantenimiento.</h3>
									<p> Hasta la llegada del Cloud, las empresas se veían obligadas a dedicar tiempo y
										recursos económicos para la reparación de equipos que han sufrido problemas de
										funcionamiento
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="media block-6 services d-block ftco-animate">
								<div class="icon"><span class="fab fa-cloudversify"></span></div>
								<div class="media-body">
									<h3 class="heading mb-3">Movilidad y acceso desde cualquier lugar.</h3>
									<p>Y desde cualquier dispositivo. La información de la empresa deja de estar sólo en
										la oficina y da paso a la movilidad, tanto para trabajar como para atender a
										diferentes clientes. Esto repercute en una mayor flexibilidad y movilidad
										laboral.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex align-items-stretch">
					<div class="img w-100" style="background-image: url(images/Cloud2.png);"></div>
				</div>
			</div>
			<div class="row progress-circle pt-md-5">
				<div class="col-md-7 order-md-last py-md-5">
					<div class="row">
						<div class="col-md-4 mb-md-0 mb-4 ftco-animate">
							<div class="">
								<h2 class="text-center mb-4">Eficiencia</h2>

								<!-- Progress bar 1 -->
								<div class="progress mx-auto" data-value='2'>
									<span class="progress-left">
										<span class="progress-bar border-primary"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar border-primary"></span>
									</span>
									<div
										class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
										<div class="h5"><?php  echo number_format($dif1); ?> <sup class="small">%</sup></div>
									</div>
								</div>
								<!-- END -->
							</div>
						</div>

						<div class="col-md-4 mb-md-0 mb-4 ftco-animate">
							<div class="">
								<h2 class="text-center mb-4">Desarrollo</h2>

								<!-- Progress bar 1 -->
								<div class="progress mx-auto" data-value='80'>
									<span class="progress-left">
										<span class="progress-bar border-primary"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar border-primary"></span>
									</span>
									<div
										class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
										<div class="h5">80<sup class="small">%</sup></div>
									</div>
								</div>
								<!-- END -->
							</div>
						</div>

						<div class="col-md-4 mb-md-0 mb-4 ftco-animate">
							<div class="">
								<h2 class="text-center mb-4">Producción</h2>

								<!-- Progress bar 1 -->
								<div class="progress mx-auto" data-value='75'>
									<span class="progress-left">
										<span class="progress-bar border-primary"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar border-primary"></span>
									</span>
									<div
										class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
										<div class="h5">75<sup class="small">%</sup></div>
									</div>
								</div>
								<!-- END -->
							</div>
						</div>

						<div class="p-md-4 mt-4">
							<div class="col-md-8 ftco-animate">
								<p>Cloud son tecnologías que habilita al usuario el consumo de servicios pagando solo
									por lo que se consume, de forma escalable, elástica, flexible y por medio de un
									portal de auto aprovisionamiento. Escalabilidad y Elasticidad</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 d-flex align-items-stretch ftco-animate">
					<div class="img w-100" style="background-image: url(images/pcmag.jpg);"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Services Section -->
	<div class="container">
		
		<img src="images/Cloud3.png" alt="" style="width:70%" class="mx-auto d-block">
		
	  </div>
     
	  <div class="form-group text-center mt-4">
	  <form action="/cloudinformacion">
		<input type="submit" value="Ver Más" class="btn btn-primary py-3 px-5">
      </form>	
	</div>
	 


	<section class="ftco-section testimony-section" id="testimonial">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-4 heading-section ftco-animate">
					<span class="subheading">iDynatron</span>
					<h2 class="mb-4">Desarrolladores</h2>
					<p>creando nuevas oportunidades para empresas sobre tecnologias.</p>
				</div>
			</div>
			<div class="row ftco-animate">
				<div class="col-md-12">
					<div class="carousel-testimony owl-carousel">
						<div class="item">
							<div class="testimony-wrap p-4 pb-5">
								<div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-5 pl-4 line">Lorem ipsum dolor sit amet consectetur adipisicing elit. In et asperiores nobis deserunt, fuga cupiditate quos modi, beatae, quidem laudantium iste a neque. Ducimus amet ex laborum, porro nulla ipsa.</p>
									<div class="pl-5">
										<p class="name">Marcelo Villarroel</p>
										<span class="position">Desarrollador</span>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap p-4 pb-5">
								<div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-5 pl-4 line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sint necessitatibus aliquam magnam vitae culpa beatae praesentium, qui voluptatibus excepturi dolorem repellendus iusto nesciunt quod! Eius minus repellendus maxime modi.</p>
									<div class="pl-5">
										<p class="name">Alejandro Rojas</p>
										<span class="position">Desarrollador</span>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap p-4 pb-5">
								<div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-5 pl-4 line">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit voluptatibus consectetur rerum eaque ipsam tenetur dicta laboriosam possimus odio, laudantium minus tempora vero perferendis ipsa quas porro voluptatum delectus rem.</p>
									<div class="pl-5">
										<p class="name">Diego olivares</p>
										<span class="position">Desarrollador</span>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>
	

		
	




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