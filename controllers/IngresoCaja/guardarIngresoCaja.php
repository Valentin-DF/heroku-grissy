<?php

require_once('/xampp/htdocs/Grissy/logic/gestorIngresoCaja.php');

try {

    if (isset($_POST['codigo']) && isset($_POST['monto']) && isset($_POST['tipo']) ) {

        if (exixtenciaIngresoCaja($_POST['codigo']) == 1){
            $mensaje  = array(
                "warning" => "false",
                "msj" => "El codigo se encuentra en uso",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        }else if ($_POST['codigo'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "El codigo es incorrecto",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else  if ($_POST['monto'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "Asigne un nombre al area",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else {

            $monto = $_POST['monto'];
            $tipo = $_POST['tipo'];
            $codigo = $_POST['codigo'];

            guardarIngresoCaja($monto,$tipo,$codigo);
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
