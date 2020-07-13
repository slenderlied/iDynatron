<?php
    /**
    * Testeando conexión PHP con MongoDB
    */
    // asegurándose de que la extensión esté cargada
    if (extension_loaded("mongodb")) {
        // Capturar cualquier error que pordría surgir
        try {
            // conexión con servidor AWS utilizando Driver MongoDB -> IP Servidor AWS y Puerto MongoDB 
            $manager = new MongoDB\Driver\Manager("mongodb://18.210.33.55:27017");
            $manager1 = new MongoDB\Driver\Manager("mongodb://18.210.33.55:27017");
            // utilizar base de datos iDynatron y la colección Usuario 
            $dbname = "iDynatron.Usuario";
            // utilizar base de datos iDynatron y la colección Servidor 
            $dbname1 = "iDynatron.Servidor";
            // utilizar base de datos iDynatron y la colección Storage
            $dbname2 = "iDynatron.Storage";

        } catch (MongoConnectionException $e) {
            var_dump($e);
        }
    }
    ?>