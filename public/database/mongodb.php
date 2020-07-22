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

            // utilizar base de datos iDynatron y la colección Costos_Energia_Hardware
            $dbname3 = "iDynatron.Costos_Energia_Hardware";

            // utilizar base de datos iDynatron y la colección Costos_Hardware
            $dbname4 = "iDynatron.Costos_Hardware";

            // utilizar base de datos iDynatron y la colección Costos_Software
            $dbname5 = "iDynatron.Costos_Software";

            // utilizar base de datos iDynatron y la colección Maquinas_EC2_AWS
            $dbname6 = "iDynatron.Maquinas_EC2_AWS";

            // utilizar base de datos iDynatron y la colección Maquinas_EC2_AWS
            $dbname7 = "iDynatron.Costos_Storage";

            // utilizar base de datos iDynatron y la colección Maquinas_EC2_AWS
            $dbname8 = "iDynatron.Costos_Red";

            // utilizar base de datos iDynatron y la colección Maquinas_EC2_AWS
            $dbname9 = "iDynatron.Costos_Operaciones";
            
        } catch (MongoConnectionException $e) {
            var_dump($e);
        }
    }
    ?>