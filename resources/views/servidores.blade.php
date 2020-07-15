<?php

include ("database/mongodb.php");
include ("security/seguridadnologin.php");

//return redirect()->to('menu')->send();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>

<body>
<!---  comenzamos con la cabecera  -->
   <div class="header">
    <div class="top-header">
      <div class="contenedor">
         <div class="top-menu">
           <ul>
             <li><a href="#">INICIO</a></li>
             <li><a href="#">ACERCA DE</a></li>
             <li><a href="#">CONTACTO</a></li>
             <li><a>HOLA: <?php echo $_SESSION['nombre']?> <?php echo $_SESSION['apellido']?></a></li>
           </ul>
         </div>
        <div class="top-redes">
          <ul>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">twitter</a></li>
            <li><a href="#">facebook</a></li>
          </ul>
        </div>
      </div>
    </div>


    <div class="titulo-blog">
        <div class="contenedor">
          <h1><a href="#">iDynatron</a></h1>
          <p class="subtitulo">Consulta Gastos</p>
        </div>
      </div>
    
      <div class="menu-principal">
        <div class="contenedor">
          
        </div>
      </div>
        </div>

        <form action="php/addservidores.php" method="post">
        <div id="listas" class="container justify-content-center">
            <h2>Servidores</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Procesador</label>
                    <input type="number" class="form-control" name="servidorprocesador[]" value="1">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Cores</label>
                    <input type="number" class="form-control" name="coreservidor[]" value="1">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">N° Servidores</label>
                    <input type="number" class="form-control" name="numeroservidor[]" value="1">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Memoria</label>
                    <input type="number" class="form-control" name="memoriaservidor[]" value="1">
                </div>
            </div>
            <input type="button" id="add_field" value="adicionar">
            </div>

            <div id="listas1" class="container justify-content-center">
            <h2>Storage </h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Procesador</label>
                    <input type="number" class="form-control" name="procesadorstorage[]" value="1">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Cores</label>
                    <input type="number" class="form-control" name="corestorage[]" value="1">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">N° Servidores</label>
                    <input type="number" class="form-control" name="numerostorage[]" value="1">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Memoria</label>
                    <input type="number" class="form-control" name="memoriastorage[]" value="1">
                </div>
                <input type="button" id="add_field1" value="adicionar">
            </div>
    </div>
    <div class="container justify-content-center col-md-2">
    <button type="submit" class="btn btn-primary">Calcular</button>
    </div>  
   
    <div class="container justify-content-center">
            <h2>Costos (CLP)</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Costos de electricidad</label>
                    <input type="number" class="form-control" name="costoelectricidad" value="131" disabled>
                    
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Costos de almacenamiento</label>
                    <input type="number" class="form-control" name="costoalmacenamiento" value="131" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Costos de personal de TI</label>
                    <input type="number" class="form-control" name="costopersonal" value="3317" disabled>
                </div>
            </div>
    </div> 
    </form>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/js/servidores.js"></script>
  <script src="js/js/servidores1.js"></script>





    <div class="footer mt-5">
        <p>(C) Todos los derechos Reservados</p>
      </div>


</html>