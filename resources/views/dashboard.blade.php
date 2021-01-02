<?php
include ("database/mongodb.php");
include ("security/seguridadnologin.php");

$fechafilter = $_GET["fecha"];
$fechatitulo = substr($fechafilter,0,10);

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
	$fotousu = $row1 -> foto;
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
<html>
<head>
	<title>DynaCloud - Dashboard </title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="images/AT-pro-logo.png"/>

	
	<!-- Import lib -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-free/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<!-- End import lib -->

	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-free/css/style.css">
</head>
<body class="overlay-scrollbar">
	<!-- navbar -->
	<div class="navbar">
		<!-- nav left -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link">
					<i class="fas fa-bars" onclick="collapseSidebar()"></i>
				</a>
			</li>
			<li class="nav-item">
				<img src="images\baseline_camera_black_18dp.png" alt="ATPro logo" class="logo logo-light">
				<img src="images\baseline_camera_white_18dp.png" alt="ATPro logo" class="logo logo-dark">
			</li>
		</ul>
		<!-- end nav left -->
		<!-- form -->
		<form class="navbar-search">
			<input type="text" name="Search" class="navbar-search-input" placeholder="Busqueda...">
			<i class="fas fa-search"></i>
		</form>
		<!-- end form -->
		<!-- nav right -->
		<ul class="navbar-nav nav-right">
			<li class="nav-item mode">
				<a class="nav-link" href="#" onclick="switchTheme()">
					<i class="fas fa-moon dark-icon"></i>
					<i class="fas fa-sun light-icon"></i>
				</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link">
					<i class="fas fa-bell dropdown-toggle" data-toggle="notification-menu"></i>
					<span class="navbar-badge"></span>
				</a>
				<ul id="notification-menu" class="dropdown-menu notification-menu">
					<div class="dropdown-menu-header">
						<span>
							Notificaciones
						</span>
					</div>
					<div class="dropdown-menu-content overlay-scrollbar scrollbar-hover">
						
					</div>
					<div class="dropdown-menu-footer">
						<span>
							Ver todas las notificaciones
						</span>
					</div>
				</ul>
			</li>
			<li class="nav-item avt-wrapper">
				<div class="avt dropdown">
					<img src="images/files/<?php echo $fotousu ?>" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
					<ul id="user-menu" class="dropdown-menu">
						<li  class="dropdown-menu-item">
							<a class="dropdown-menu-link">
								<div>
									<i class="fas fa-user-tie"></i>
								</div>
								<span>Perfil</span>
							</a>
						</li>
						<li class="dropdown-menu-item">
							<a href="#" class="dropdown-menu-link">
								<div>
									<i class="fas fa-cog"></i>
								</div>
								<span>Configuración</span>
							</a>
						</li>
						
						</li>
						<li  class="dropdown-menu-item">
							<a href="#" class="dropdown-menu-link">
								<div>
									<i class="fas fa-sign-out-alt"></i>
								</div>
								<span>Salir</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
		<!-- end nav right -->
	</div>
	<!-- end navbar -->
	<!-- Menu  -->
	<div class="sidebar">
		<ul class="sidebar-nav">
			<li class="sidebar-nav-item">
				<a href="#" class="sidebar-nav-link">
					<div>
						<i class="fas fa-tachometer-alt"></i>
					</div>
					<span>
						Dashboard <?php echo $nombreservidor ?>
					</span>
				</a>
			
		</ul>
	</div>
	<!-- end sidebar -->
	<!-- main content -->
	<div class="wrapper">

		<div class="row">
		<div class="col-4 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							Gráfico de Barra <?php echo $nombreservidor ?>
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
					<div class="progress-wrapper">
					<canvas id="myChart1" ></canvas>
					</div>
					</div>
				</div>
			</div>
			<div class="col-4 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							Gráfico Circular <?php echo $nombreservidor ?>
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
						<div class="progress-wrapper">
						<canvas id="myChart2"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-4 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							Gráfico de Rosquilla <?php echo $nombreservidor ?>
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
						<div class="progress-wrapper">
						<canvas id="myChart3"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
						Gráfico de Radar <?php echo $nombreservidor ?>
						</h3>
					</div>
					<div class="card-content">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end main content -->
	<!-- import script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="js/js/index.js"></script>
	<!-- end import script -->

	<script>
var ctx = document.getElementById('myChart');
ctx.height = 350
ctx.width = 350
var data = {
	labels: ['Primer Año', 'Segundo Año', 'Tercer Año', 'Cuarto Año', 'Quinto Año'],
	datasets: [{
		fill: false,
		label: 'On-Premise',
		borderColor: successColor,
		data: [ <?php echo $clpsumtotmes*12?>,<?php echo $clpsumtotmes*24?>, <?php echo $clpsumtotmes*36?>, <?php echo $clpsumtotmes*48?>, <?php echo $clpsumtotmes*60?>],
		borderWidth: 2,
		lineTension: 0,
	}, {
		fill: false,
		label: 'Cloud',
		borderColor: dangerColor,
		data: [<?php echo $clpsumcloud*12?>, <?php echo $clpsumcloud*24?>, <?php echo $clpsumcloud*36?>, <?php echo $clpsumcloud*48?>, <?php echo $clpsumcloud*60?>],
		borderWidth: 2,
		lineTension: 0,
	}]
}

var lineChart = new Chart(ctx, {
	type: 'line',
	data: data,
	options: {
		maintainAspectRatio: false,
		bezierCurve: false,
	}
});


var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['On-Premise', 'Cloud'],
        datasets: [{
            label: '# of Votes',
            data: [<?php echo $clpsumtotmes?>, <?php echo $clpsumcloud?>],
            backgroundColor: [
                'rgba(255, 99, 132,0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235,1)',
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


var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});
// And for a doughnut chart
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: options
});

    </script>

<script>

var ctx = document.getElementById('myChart2').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Pimer Año', 'Segundo Año', 'Tercer Año', 'Cuarto Año', 'Quinto Año'],
        datasets: [{
            label: 'On-Premise',
            data: [ <?php echo $clpsumtotmes*12?>,<?php echo $clpsumtotmes*24?>, <?php echo $clpsumtotmes*36?>, <?php echo $clpsumtotmes*48?>, <?php echo $clpsumtotmes*60?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)'
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
        }, {
            label: 'Cloud',
            data: [<?php echo $clpsumcloud*12?>, <?php echo $clpsumcloud*24?>, <?php echo $clpsumcloud*36?>, <?php echo $clpsumcloud*48?>, <?php echo $clpsumcloud*60?>],
            backgroundColor: [
				'rgba(54, 162, 235, 0.8)',
                'rgba(255, 99, 132, 0.8)',  
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
				'rgba(255, 206, 86, 0.8)',
                'rgba(255, 159, 64, 0.8)'
            ],
            borderColor: [
				'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
				'rgba(255, 206, 86, 1)',
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


<script>
var ctx = document.getElementById('myChart3').getContext('2d');

var myChart = new Chart(ctx, {
	type: 'radar',
    data: {
        labels: ['Primer Año', 'Segundo Año', 'Tercer Año', 'Cuarto Año', 'Quinto Año'],
        datasets: [{
            label: 'On-Premise',
			data: [ <?php echo $clpsumtotmes*12?>,<?php echo $clpsumtotmes*24?>, <?php echo $clpsumtotmes*36?>, <?php echo $clpsumtotmes*48?>, <?php echo $clpsumtotmes*60?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.4)',
                'rgba(54, 162, 235, 0.4)',
                'rgba(255, 206, 86, 0.4)',
                'rgba(75, 192, 192, 0.4)',
                'rgba(153, 102, 255, 0.4)',
                'rgba(255, 159, 64, 0.4)'
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
        }, {
            label: 'Cloud',
            data: [<?php echo $clpsumcloud*12?>, <?php echo $clpsumcloud*24?>, <?php echo $clpsumcloud*36?>, <?php echo $clpsumcloud*48?>, <?php echo $clpsumcloud*60?>],
            backgroundColor: [
				'rgba(54, 162, 235, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)'
            ],
            borderColor: [
				'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
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

</body>
</html>