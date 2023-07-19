<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once "vendor/autoload.php";
require_once "conexion/conexion.php";
require_once 'respuestas.class.php';

//Esta clase la hacemos para el login con el protolocolo y con el token

class auth extends conexion{


    public function login($json){
        $_respuestas =new respuestas;
        $datosUsuario = json_decode($json,true);
    if(!isset($datosUsuario['usuario']) || !isset($datosUsuario['password']) ){

        echo "Contraseña o usuario incorrecto";
        return $_respuestas->error_400();

        }else{
            
            $usuario = $datosUsuario['usuario'];
            $password = $datosUsuario['password'];
            $datosUsuario = $this->obtenerDatosUsuario($usuario);
            $password = parent::encriptar($password);

            if($datosUsuario){
                echo "Si existe el usuario";
                //
                if($password == $datosUsuario[0]['Password']){
                    if($datosUsuario[0]['Estado'] == 'Activo'){
                        //crear token
                        $verificar = $this->insertarToken($datosUsuario[0]['UsuarioId']);
                        if($verificar){
                            //si se guardo 
                            $result = $_respuestas->response;
                            $result['result'] = array(
                                "token" => $verificar
                            );
                            return $result;
                        }else{
                            $_respuestas->error_500("Error interno  del servidor al guardar");
                        }
                    }else{
                        //Esta inactivo el usuario
                    return $_respuestas->error_200("El usuario" . $usuario . " esta inactivo");

                    }
                }else{
                    //La contraseña no es igual
                    return $_respuestas->error_200("Pasword invalido");
                }

            }else{

                return $_respuestas->error_200("El usuario " . $usuario . " no existe");
            }
        }

    }




    private function obtenerDatosUsuario($correo){
        $query = "SELECT UsuarioId, Password, Estado FROM usuarios WHERE Usuario = '$correo'";
        $datosUsuario = parent::ObtenerDatos($query);
        if(isset($datosUsuario[0]["UsuarioId"])){
            return $datosUsuario;
        }else{
            return 0;
        }
    }


private function insertarToken($usuarioId){
    
    $key = 'RFC 7516';
    $payload = [
        'iss' => 'localhost',
        'aud' => 'localhost',
        'iat' => 'kike',
        'nbf' => 'kike'
    ];
    $val = true;
    $jwt = JWT::encode($payload, $key, 'HS256');
    $date = date("Y-m-d H:i");
    $estado = 'Activo';
    $query = "INSERT INTO usuarios_token (UsuarioId,Token,Estado,Fecha) VALUES ('$usuarioId','$jwt','$estado','$date')";
    $verifica = parent::Guardar($query);
    if($verifica){
        return $json = json_encode($jwt);
    }else{
        return 0;
    }
}



}


?>