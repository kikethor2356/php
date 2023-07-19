<?php

    $a=rand(1,20);
    $b=rand(1,10);
    #suma($a,$b);
    tabla();
    

    function suma($a,$b){

        $suma=$a+$b;

        echo "Este es el resultado de tu suma: " . $suma;
        return $suma;
    }


   
    function tabla(){
        $numero=rand(1,10);

        
            for($i=0;$i<10;$i++){

            $cont=$i+1;
            $resul=$numero*$cont;
            echo "<br>".$numero . "x" . $cont . "=" . $resul;

            }
            
        }



    

?>