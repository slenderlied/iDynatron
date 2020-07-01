<?php
    /**
    * Testing PHP connection with MongoDB
    * and getting documents from a database
    */
    // making sure the extension is loaded
    if (extension_loaded("mongodb")) {
        // catch exception and output details if it occurs
        try {
            // conectarse con el servidor AWS 
            $manager = new MongoDB\Driver\Manager("mongodb://18.210.33.55:27017");

            // utilizar la base de datos iDynatron y la colección Usuario 
            $dbname = "iDynatron.Usuario";
            
        } catch (MongoConnectionException $e) {
            var_dump($e);
        }
    }
    ?>