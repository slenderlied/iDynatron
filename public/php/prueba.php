<?php

$campo = $_POST["campo"];
$suma=0;
//$i=0;
//foreach ($campo as $key) {

 //$suma=$suma+$key;
//$i= ++$i;
//}

//echo $suma;

for ($i=0; $i <sizeof($campo); $i++) { 
    echo $campo[$i];
}

if($i==1){

echo "1";

}else if($i == 2){

echo "2";

}else{

echo "3";

}


?>