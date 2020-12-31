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
	$nombreservidor = $row -> Nombre_Servidor;
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
  $cloudproducto = $row -> Producto_Cloud;
  $costopersonalcloud = $row -> Costo_Personal_Cloud;
  $precioalmacenamiento = $row -> Costo_Almacenamiento_Cloud;
  $precioredalmacenamiento = $row -> Costo_Red_Cloud;
  //--\\
  //Conversión Precio Dolar a Pesos Chilenos\\
  //On Premise\\ 
  $clpsumtotmes= $sumtotmes*$dolar;
  $clpcostopersonalti = $costopersonalti * $dolar;
  $clphardpremi = $hardpremi * $dolar;
  $clpelecpremi = $elecpremi * $dolar;
  $clpsoftpremi = $softpremi * $dolar;
  $clredepremi = $redepremi * $dolar;
  $clpmanteremi = $manteremi * $dolar;
  //--\\
  //Cloud\\
  $clpsumcloud= $sumcloud*$dolar;
  $clpcloudproducto = $cloudproducto*$dolar;
  $clpcostopersonalcloud = $costopersonalcloud*$dolar;
  $clpprecioalmacenamiento = $precioalmacenamiento*$dolar;
  $clpprecioredalmacenamiento = $precioredalmacenamiento*$dolar;
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
	
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
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
						<span class="fa fa-file-pdf-o"></i></span>
						</div>
						<div>
						<h5 class="mb-4">Generar Informe</h5>
						<form action="/pdf" method="get">   
          <?php echo "<button type='input' class='btn btn-primary'>Ver Informe PDF</button>";?> 
          <input type="hidden" name="fecha" value="<?php echo $fechafilter  ?>">
		  <input type="hidden" name="idrandom" value="<?php echo $idrandom  ?>">

          </form> 
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fas fa-server"></i></span>
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
							<span class="far fa-building"></span>
						</div>
						<div>     
						<h5 class="mb-4">Nombre Servidor</h5>
							<p style="font-size: 18px;"><?php echo $nombreservidor ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-tachometer"></i></span>
						</div>
						<div>
						<h5 class="mb-4">Generar Dashboard</h5>
						<form action="/dashboard" method="get">   
          <?php echo "<button type='input' class='btn btn-primary'>Ver Dashboard</button>";?> 
          <input type="hidden" name="fecha" value="<?php echo $fechafilter ?>">
		  <input type="hidden" name="idrandom" value="<?php echo $idrandom  ?>">
          </form> 
						</div>
					</div>
				</div>
			</div>

			

			<div class="row block-9">
				<div class="col-md-6 ftco-animate">

				<canvas id="myChart" style="height:50vh; width:40vw"></canvas>

				
					<form action="#" class="contact-form p-4 p-md-5 py-md-5">
                    <div class="form-group">
                    <h2 class="mb-4 text-center">ON-PREMISE</h2>
					</div>
						<div class="form-group">
                        <p style="font-size: 20px;">Gasto Total: $<?php echo number_format($clpsumtotmes, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Personal TI: $<?php echo number_format($clpcostopersonalti, 0, ",", ".");  ?></p>
						<p style="font-size: 20px;">Gasto Electricidad: $<?php echo number_format($clpelecpremi, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Hardware: $<?php echo number_format($clphardpremi, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Software: $<?php echo number_format($clpsoftpremi, 0, ",", ".");  ?></p>
						<p style="font-size: 20px;">Gasto Redes: $<?php echo number_format($clredepremi, 0, ",", ".");  ?></p>
						<p style="font-size: 20px;">Gasto Mantención Redes: $<?php echo number_format($clpmanteremi, 0, ",", ".");  ?></p>
						</div>
					</form>
				</div>
				
				<div class="col-md-6 ftco-animate">

				<canvas id="myChart1" style="height:50vh; width:40vw"></canvas>

					<form action="#" class="contact-form p-4 p-md-5 py-md-5">
                    <div class="form-group">
                    <h2 class="mb-4 text-center">CLOUD</h2>
					</div>
						<div class="form-group">
                        <p style="font-size: 20px;">Gasto Total: $<?php echo number_format($clpsumcloud, 0, ",", ".");  ?></p>
						<p style="font-size: 20px;">Gasto Producto Cloud: $<?php echo number_format($clpcloudproducto, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Personal Cloud: $<?php echo number_format($clpcostopersonalcloud, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Almacenamiento Cloud: $<?php echo number_format($clpprecioalmacenamiento, 0, ",", ".");  ?></p>
                        <p style="font-size: 20px;">Gasto Red Cloud: $<?php echo number_format($clpprecioredalmacenamiento, 0, ",", ".");  ?></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- End Contact Section -->



	<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Primer Año', 'Segundo Año'],
        datasets: [{
            label: 'On-Premise',
            data: [<?php echo $clpsumtotmes*12 ?>, <?php echo $clpsumtotmes*24 ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',
    data: {
        labels: ['Primer Año', 'Segundo Año'],
        datasets: [{
            label: 'Cloud',
            data: [<?php echo $clpsumcloud*12 ?>, <?php echo $clpsumcloud*24 ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>	
	

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