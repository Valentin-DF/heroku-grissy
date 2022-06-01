<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCargo.php');

try {

    if (isset($_POST['codigo']) && isset($_POST['nombre'])  && isset($_POST['principal']) && isset($_POST['secundario']) ) {

        if (exixtenciaCargo($_POST['codigo']) == 1){
            $mensaje  = array(
                "warning" => "false",
                "msj" => "El codigo se encuentra en uso",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        }else if ($_POST['codigo'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "Necesita Colocar un codigo al cargo",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else if ($_POST['nombre'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "Necesita Colocar un nombre al cargo",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else {

            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $principal = $_POST['principal'];
            $secundario = $_POST['secundario'];

            guardarCargo($codigo, $nombre, $principal,$secundario);
            
            $mensaje  = array(
                "warning" => "true",
                "msj" => "Se guardo correctamente",
                "color" => "linear-gradient(to right, #2e8f39,#8cfaa4)"
            );
            echo json_encode($mensaje);
        }
    } else {
        $mensaje  = array(
            "warning" => "false",
            "msj" => "No se guardo los datos",
            "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
        );
        echo json_encode($mensaje);
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
