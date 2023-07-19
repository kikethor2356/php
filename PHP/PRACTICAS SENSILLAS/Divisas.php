<?php



$Peso=17.67;
$Dolar=5;

cambioDolar($Peso,$Dolar);

function cambioDolar($Peso, $Dolar){

$DolarPeso= $Dolar*$Peso;

echo "Son " . $DolarPeso . " pesos";



}

 function hola(){

    
    echo "si entra a la funcion pero no al while";

         $cont=1;
        $con=$cont+1;
        
    echo "Hola mundo";
    
}



?>