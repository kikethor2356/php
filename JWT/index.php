
<?php
require 'jwt.php';
require 'Conexion/Conexion.class.php';
//Hago la instacia de la clase token y de la funtion codificarToken

$_conexion = new conexion;
$_conexion->iniciarConexion();


$datosUsuario= array( 
    'isd' => 'localhost',
    'aud' => 'localhost',
    'username' => 'Jonas',
    'password' => '@jdfghhjsgd@34542'
);

$json = json_encode($datosUsuario);
file_put_contents('archivo_origen.json', $json);

//$_auth = new auth;
//$_auth->VerificarUsuario();

$_token = new token;
$_token->CodificarToken($datosUsuario); 
$_token->DescodificarToken($datosUsuario);

exit;





//$decode = JWT::decode($encode, new key($secret_key, 'HS256'));

   
 // print_r($decode);





?>