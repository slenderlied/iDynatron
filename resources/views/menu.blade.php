<?php

include ("database/mongodb.php");
include ("security/seguridadnologin.php");
$correo=$_SESSION['correo'];


$filter = [
    'correo' => $correo
    ];
    $query = new MongoDB\Driver\Query($filter);

//$query = new MongoDB\Driver\Query([]);

$cursor = $manager->executeQuery($dbname, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if(isset($_SESSION['correo'])){

        foreach($cursor as $row){
        

}

}else{

	header("Location: /login");


}
?><br>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>DynaCloud</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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

    <link rel="stylesheet" href="css/estilos.css">

	<script src="https://kit.fontawesome.com/5ef377022b.js" crossorigin="anonymous"></script>
</head>

<body>


<div class="header">
    <div class="top-header">
      <div class="contenedor">
         <div class="top-menu">
           <ul>
             <li><a href="/menu">INICIO</a></li>
             <li><a href="#">ACERCA DE</a></li>
             <li><a href="#">CONTACTO</a></li>
             <li><a href="/perfilusuario" style="text-transform: uppercase">HOLA: <?php echo $row -> nombre?> <?php echo $row -> apellido?></a></li>
           </ul>
         </div>
        <div class="top-redes">
          <ul>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">twitter</a></li>
            <li><a href="#">facebook</a></li>
			<li><a href="../php/logout.php">Cerrar Sesión</a></li>
          </ul>
        </div>
      </div>
    </div>

	<div class="titulo-blog ">
        <div class="contenedor">
          <h3><a class="text-white">iDynatron</a></h3>
          <h1>Menú Usuario</h1>
        </div>
      </div>
    
      <div class="menu-principal">
        <div class="contenedor">
          
        </div>
      </div>
        </div>

<br>
	<div class="container">
		
		<img src="images/Cloud3.png" alt="" style="width:70%" class="mx-auto d-block">
		
	  </div>
     
	  <div class="form-group text-center mt-4">
		<form action="/tcoservidores"><input type="submit" value="Calculadora Tco" class="btn btn-primary py-3 px-5"> </form> <br>
		 <input type="submit" value="Busqueda service Cloud" class="btn btn-primary py-3 px-5">
	</div>

	<section class="ftco-section contact-section p-2" id="contact">
		<div class="container">

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
                    <h2 class="mb-4 text-center"><a href="/mejorarcuenta">Mejorar Cuenta</a> </h2>
					</div>
						
					</form>
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