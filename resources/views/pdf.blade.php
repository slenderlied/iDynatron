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
  $clpredepremi = $redepremi * $dolar;
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
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/AT-pro-logo.png"/>
    <title>DynaCloud - Informe TCO </title>
    <link rel="stylesheet" href="css/css/style.css" media="all" />


  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
      <img src="images\baseline_camera_black_18dp.png" alt="">
      </div>
      <h1> Informe TCO </h1>
      <div id="company" class="clearfix">
        <div>Organización</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project" >
      <div style="font-size: 15px" ><span>ORG</span> <?php echo $orgausua?> </div>
        <div style="font-size: 15px" ><span>USUARIO</span>  <?php echo $nombreusua?> <?php echo $apeusua ?></div>
        <div style="font-size: 15px" ><span>EMAIL</span>  <?php echo $correousua?></a></div>
        <div style="font-size: 15px" ><span>FECHA</span> <?php echo $fechatitulo?></div>
      </div>
    </header>
    <main>

<h1>On-Premise | <?php echo $nombreservidor ?></h1>

      <table>
        <thead>
          <tr style="font-size:13px;">
            <th class="service">SERVICIO</th>
            <th class="desc">DESCRIPCIÓN</th>
            <th>USD</th>
            <th>CLP</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr style="font-size:12px;">
            <td class="service">Personal TI</td>
            <td class="desc">Profesional encargado de dar soporte a todas las comunicaciones de la empresa e instalación y actualización de diferentes softwares, equipos y reparación de ellos.</td>
            <td class="unit">$<?php echo $costopersonalti?></td>
            <td class="qty">$<?php echo number_format($clpcostopersonalti, 0, ",", ".");  ?></td>
            <td class="total">$<?php echo number_format($clpcostopersonalti, 0, ",", ".");  ?></td>
          </tr>
          <tr style="font-size:12px;">
            <td class="service">Hardware</td>
            <td class="desc">Conjunto de elementos físicos que constituyen una computadora o un sistema informático.</td>
            <td class="unit">$<?php echo $hardpremi?></td>
            <td class="qty">$<?php echo number_format($clphardpremi, 0, ",", ".");  ?></td>
            <td class="total">$<?php echo number_format($clphardpremi, 0, ",", ".");  ?></td>
          </tr>
          <tr style="font-size:12px;">
            <td class="service">Software</td>
            <td class="desc">Conjunto de programas y rutinas que permiten a la computadora realizar determinadas tareas.</td>
            <td class="unit">$<?php echo $softpremi?></td>
            <td class="qty">$<?php echo number_format($clpsoftpremi, 0, ",", ".");?></td>
            <td class="total">$<?php echo number_format($clpsoftpremi, 0, ",", ".");?></td>
          </tr>
          <tr style="font-size:12px;">
            <td class="service">Electricidad</td>
            <td class="desc">Cantidad de energía utilizada.</td>
            <td class="unit">$<?php echo $elecpremi?></td>
            <td class="qty">$<?php echo number_format($clpelecpremi, 0, ",", ".");?></td>
            <td class="total">$<?php echo number_format($clpelecpremi, 0, ",", ".");?></td>
          </tr>
          <tr style="font-size:12px;">
            <td class="service">Redes</td>
            <td class="desc">Las redes mantienen la comunicación y operación, tanto de manera interna como externa.</td>
            <td class="unit">$<?php echo $redepremi?></td>
            <td class="qty">$<?php echo number_format($clpredepremi, 0, ",", ".");?></td>
            <td class="total">$<?php echo number_format($clpredepremi, 0, ",", ".");?></td>
          </tr>
          <tr style="font-size:12px;">
            <td class="service">Mantención Redes</td>
            <td class="desc">Un Mantenimiento de redes preventivo permite solucionar cualquier problema antes de que suceda y optimizar los recursos de los que dispones.</td>
            <td class="unit">$<?php echo $manteremi?></td>
            <td class="qty">$<?php echo number_format($clpmanteremi, 0, ",", ".");?></td>
            <td class="total">$<?php echo number_format($clpmanteremi, 0, ",", ".");?></td>
          </tr>
          <tr style="font-size:12px;">
            <td colspan="4" class="grand total">TOTAL ON-PREMISE</td>
            <td class="grand total">$<?php echo number_format($clpsumtotmes, 0, ",", ".");?></td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Todos los precios están sujetos a cambios debido a las especificaciones, cantidades, costos, recursos humanos disponibles de cada usuario o empresa.</div>
      </div>
    </main>

    <h1>Cloud | <?php echo $nombreservidor ?></h1>

<table>
  <thead>
  <tr style="font-size:14px;">
  <th class="service">SERVICIO</th>
  <th class="desc">DESCRIPCIÓN</th>
      <th>USD</th>
      <th>CLP</th>
      <th>TOTAL</th>
    </tr>
  </thead>
  <tbody>
  <tr style="font-size:12px;">
      <td class="service">Producto Cloud</td>
      <td class="desc"> Acceso remoto a softwares, almacenamiento de archivos y procesamiento de datos por medio de Internet.</td>
      <td class="unit">$<?php echo $cloudproducto?></td>
      <td class="qty">$<?php echo number_format($clpcloudproducto, 0, ",", ".");?></td>
      <td class="total">$<?php echo number_format($clpcloudproducto, 0, ",", ".");?></td>
    </tr>
    <tr style="font-size:12px;">
      <td class="service">Personal Cloud</td>
      <td class="desc">Nube personal es una colección de contenido y servicios digitales a los que se puede acceder desde cualquier dispositivo.</td>
      <td class="unit">$<?php echo $costopersonalcloud?></td>
      <td class="qty">$<?php echo number_format($clpcostopersonalcloud, 0, ",", ".");?></td>
      <td class="total">$<?php echo number_format($clpcostopersonalcloud, 0, ",", ".");?></td>
    </tr>
    <tr style="font-size:12px;">
      <td class="service">Almacenamiento Cloud</td>
      <td class="desc">Modelo de almacenamiento de datos basado en redes de computadoras</td>
      <td class="unit">$<?php echo $precioalmacenamiento?></td>
      <td class="qty">$<?php echo number_format($clpprecioalmacenamiento, 0, ",", ".");?></td>
      <td class="total">$<?php echo number_format($clpprecioalmacenamiento, 0, ",", ".");?></td>
    </tr>
    <tr style="font-size:12px;">
      <td class="service">Red Cloud</td>
      <td class="desc">Red de servidores conectados, propiedad de un que también los explota, y a través de la cual una organización puede distribuir contenido digital a usuarios finales.</td>
      <td class="unit">$<?php echo $precioredalmacenamiento?></td>
      <td class="qty">$<?php echo number_format($clpprecioredalmacenamiento, 0, ",", ".");?></td>
      <td class="total">$<?php echo number_format($clpprecioredalmacenamiento, 0, ",", ".");?></td>
    </tr>

          <tr style="font-size:12px;">
            <td colspan="4" class="grand total">TOTAL CLOUD</td>
            <td class="grand total">$<?php echo number_format($clpsumcloud, 0, ",", ".");?></td>
          </tr>
  </tbody>
</table>
<div id="notices">
  <div>NOTA:</div>
  <div class="notice">Todos los precios están sujetos a cambios debido a las especificaciones, cantidades, costos, recursos humanos disponibles de cada usuario o empresa.</div>
</div>
</main>






    <footer>
      DynaCloud
    </footer>
  </body>
</html>