<?php
    /**
    * Testeando conexión PHP con MongoDB
    */
    // asegurándose de que la extensión esté cargada
    if (extension_loaded("mongodb")) {
        // Capturar cualquier error que pordría surgir
        try {
            // conexión con servidor AWS utilizando Driver MongoDB -> IP Servidor AWS y Puerto MongoDB 
            $manager = new MongoDB\Driver\Manager("mongodb+srv://AJRY:AguanteMongoDB12NoMeImportaNadaLocoJajaSoyUnaContraseña@cluster0.upfka.mongodb.net/DynaCloud?retryWrites=true&w=majority");
            $manager1 = new MongoDB\Driver\Manager("mongodb+srv://AJRY:AguanteMongoDB12NoMeImportaNadaLocoJajaSoyUnaContraseña@cluster0.upfka.mongodb.net/DynaCloud?retryWrites=true&w=majority");
            // utilizar base de datos iDynatron y la colección Usuario 
            $dbname = "DynaCloud.Usuario";

            // utilizar base de datos iDynatron y la colección Servidor 
            $dbname1 = "DynaCloud.Servidor";

            // utilizar base de datos iDynatron y la colección Storage
            $dbname2 = "DynaCloud.Storage";

            // utilizar base de datos iDynatron y la colección Costos_Energia_Hardware
            $dbname3 = "DynaCloud.Costos_Energia_Hardware";

            // utilizar base de datos iDynatron y la colección Costos_Hardware
            $dbname4 = "DynaCloud.Costos_Hardware";

            // utilizar base de datos iDynatron y la colección Costos_Software
            $dbname5 = "DynaCloud.Costos_Software";

            // utilizar base de datos iDynatron y la colección Maquinas_EC2_AWS
            $dbname6 = "DynaCloud.Maquinas_EC2_AWS";

            // utilizar base de datos iDynatron y la colección Maquinas_EC2_AWS
            $dbname7 = "DynaCloud.Costos_Storage";

            // utilizar base de datos iDynatron y la colección Maquinas_EC2_AWS
            $dbname8 = "DynaCloud.Costos_Red";

            // utilizar base de datos iDynatron y la colección Maquinas_EC2_AWS
            $dbname9 = "DynaCloud.Costos_Operaciones";

            // utilizar base de datos iDynatron y la colección Maquinas_EC2_AWS
            $dbname10 = "DynaCloud.Costos_TCO_Usuario";
            
        } catch (MongoConnectionException $e) {
            var_dump($e);
        }
    }
    ?>