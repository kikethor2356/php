<?php

class respuestas{

public $response = [

    'status' => "ok",
    'result' => array()

];

//Error por metodo (POST, PUT, DELETE, GET)
public function error_405(){
    $this->response['status'] = "error";
    $this->response['result'] = array(
        "error id" => "405",
        "error_msg" => "Metodo no permitido"
    );

return $this->response;
}

//Error de datos incorrectos
public function error_200($string = "Datos incorrectos"){
    $this->response['status'] = "error";
    $this->response['result'] = array(
        "error id" => "200",
        "error_msg" => $string
    );

return $this->response;
}


//Error de datos incompletos o de formato incorrecto
public function error_400(){
    $this->response['status'] = "error";
    $this->response['result'] = array(
        "error id" => "400",
        "error_msg" => "Datos enviasdos incompletos o incorrectos"
    );

return $this->response;
}


//Error de datos incompletos o de formato incorrecto
public function error_500($string = "Error interno del servidor"){
    $this->response['status'] = "error";
    $this->response['result'] = array(
        "error id" => "500",
        "error_msg" => $string
    );

return $this->response;
}


}


?>