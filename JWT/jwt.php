
<?php


require 'vendor/autoload.php'; // Asegúrate de tener el archivo autoload.php de firebase/php-jwt

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class token{
    

function CodificarToken($payload){
    $secret_key = '85ldofi';
    $encode = JWT::encode($payload, $secret_key, 'HS256');
    echo "Este es el token: ";
    print_r ($encode); 

    
}

function DescodificarToken ($payload){
    $secret_key = '85ldofi';
    $encode = JWT::encode($payload, $secret_key, 'HS256');
    $decode = JWT::decode($encode, new key($secret_key, 'HS256'));
    echo "<tr> Estos son los datos del token: ";
    print_r($decode);
    echo $decode->username;
    exit;
}
}


?>