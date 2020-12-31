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
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/AT-pro-logo.png"/>
    <title>DynaCloud - Informe TCO <?php echo $nombreservidor ?> </title>
    <link rel="stylesheet" href="css/css/style.css" media="all" />


  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
      <img src="images\baseline_camera_black_18dp.png" alt="">
      </div>
      <h1>| Informe TCO | <?php echo $nombreservidor ?> |</h1>
      <div id="company" class="clearfix">
        <div>Organización</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project" >
      <div style="font-size: 15px" ><span>ORGANIZACIÓN</span> <?php echo $orgausua?> </div>
        <div style="font-size: 15px" ><span>USUARIO</span>  <?php echo $nombreusua?> <?php echo $apeusua ?></div>
        <div style="font-size: 15px" ><span>EMAIL</span>  <?php echo $correousua?></a></div>
        <div style="font-size: 15px" ><span>FECHA</span> <?php echo $fechatitulo?></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="service">Training</td>
            <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
            <td class="total">$160.00</td>
          </tr>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>