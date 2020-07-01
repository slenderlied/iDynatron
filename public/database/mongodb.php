<?php
    /**
    * Testing PHP connection with MongoDB
    * and getting documents from a database
    */

    // making sure the extension is loaded
    if (extension_loaded("mongodb")) {
        // catch exception and output details if it occurs
        try {
            // create the manager with the default server address
            $manager = new MongoDB\Driver\Manager("mongodb://18.210.33.55:27017");

            $dbname = "iDynatron.Usuario";
            
        } catch (MongoConnectionException $e) {
            var_dump($e);
        }
    }
    ?>