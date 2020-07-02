<?php
session_start();

if(isset($_SESSION['correo'])){

      return redirect()->to('menu')->send();
    
}

?>