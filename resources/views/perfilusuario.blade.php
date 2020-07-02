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
        
          ?>
          <table style="width:100%">
            
            <tr>
              <th>Usuario</th>
              <td><img class="img-thumbnail" width="100px" src="images/files/<?php echo $row -> foto ?>"> </td>
              <th></th>
              
            </tr>
            <tr>
              <td>Nombre: </td>
              <td><?php echo $row -> nombre ?></td>
            </tr>
            <tr>
              <td>Apellido</td>
              <td><?php echo $row -> apellido ?></td>
            </tr>
            <tr>
              <td>Correo</td>
              <td><?php echo $row -> correo ?></td>
            </tr>
            <tr>
              <td>Contraseña</td>
              <td><?php echo $row -> contrasena ?></td>
            </tr>
            <tr>
              <td>Organización</td>
              <td><?php echo $row -> organizacion ?></td>
            </tr>
            <tr>
              <td>Tipo Usuario</td>
              <td><?php echo $row -> tipoUsuario ?></td>
            </tr>
          </table>
          <br>
          <a href="/php/logout.php"> Cerrar Sesión</a>
        
          
          <?php
}

}else{

echo ":c";

}
?>
        


<!DOCTYPE html>
<html lang="en">

<head>
	<title>iDynatron</title>
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

	<section class="testimony-section" id="testimonial">
    <div class="container">

	<div class="row justify-content-center mb-5 pb-3" >
				<div class="col-md-4 heading-section ftco-animate">
				<div class="item">
							<div class="testimony-wrap p-4 pb-5 text-center">
								<div class="user-img mb-4 text-center" style="background-image: url(images/files/<?php echo $row -> foto ?>); display: block; margin:auto;">
								</div>
								<span class="position text-center" style="font-size: 15px;"><?php echo $row -> correo ?></span>
								<div class="text text-center">
								<div class="pl-auto">
								<p class="mb-3 pl-2 line name" style="font-size: 18px"><?php echo $row -> nombre ?> <?php echo $row -> apellido ?></p>
					            <h2 class="mb-3 text-center"><?php echo $row -> organizacion ?></h2>
								<h2 class="mb-3 text-center"><?php echo $row -> tipoUsuario ?></h2>		
								<div class="form-group mb-2">
							<input type="submit" value="Modificar" class="btn btn-primary py-10 px-2"> <input type="submit" value="Dashboard" class="btn btn-primary py-10 px-2">
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


