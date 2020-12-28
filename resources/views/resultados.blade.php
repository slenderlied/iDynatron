<?php
include ("database/mongodb.php");
include ("security/seguridadnologin.php");
 $fechafilter = $_GET["fecha"];
 $idrandom = $_GET["idrandom"];
$correo=$_SESSION['correo'];
$filter = [
  'correo' => $correo
  ];
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


//--\\
  }
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DynaCloud - Resultado TCO </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css/style1.css" media="all" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <link rel="icon" type="image/png" href="images/AT-pro-logo.png"/>

  </head>
  <body>
 
  

    <header class="clearfix">
      <h1>Resultado Calculadora TCO </h1>
      <div id="project">
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span><?php echo $correo ?></a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
    </header>


    <section class="ftco-section contact-section" id="contact">
		<div class="container">
			<div class="row block-15">

				<div class="col-md-6 ftco-animate">
        <canvas id="myChart" style="height:15vh; width:30vw;"></canvas>
				</div>


			</div>

		</div>
	</section>








    <div id="notices">
        <div>Informe:</div>
        <div class="notice">
          <form action="/pdf" method="get">   
          <?php echo "<button type='input' class='btn btn-outline-dark'>Ver Informe PDF</button>";?> 
          <input type="hidden" name="fecha" value="<?php echo $fechafilter ?>">
          </form> 
        </div>
      </div>






    <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Primer Año', 'Segundo Año', 'Tercer Año', 'Cuarto Año', 'Quinto Año'],
        datasets: [{
            label: 'Gasto On-Premise',
            data: [ <?php echo $sumtotmes ?>, <?php echo $sumtotmes*2 ?>, <?php echo $sumtotmes*3 ?>, <?php echo $sumtotmes*4 ?>,<?php echo $sumtotmes*5 ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 5
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
                }
            }]
        }
    }
});


</script>





    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    
  </body>
</html>