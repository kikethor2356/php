
<?php

function tokenG($leng=10){
    $cadena="ABCDEFGHIJKLMNOPQRSTUVWYXZ1234567890";
    $token="";

    for($i=0; $i<$leng; $i++){

        $token.=$cadena[rand(0,35)];

    }
            return $token;
}

echo "Este es tu token: " . tokenG(19);

?>