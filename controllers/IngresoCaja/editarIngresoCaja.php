<?php

require_once('/xampp/htdocs/Grissy/logic/gestorIngresoCaja.php');

try {

    if (isset($_POST['codigo']) && isset($_POST['monto'])) {

        if ($_POST['codigo'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "El codigo es incorrecto",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else  if ($_POST['monto'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "Asigne un monto",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else {

            $codigo = $_POST['codigo'];
            $monto = $_POST['monto'];
  
            editarIngresoCaja($codigo, $monto);

            $mensaje  = array(
                "warning" => "true",
                "msj" => "Se actualizo los datos correctamente",
                "color" => "linear-gradient(to right, #2e8f39,#8cfaa4)"
            );
            echo json_encode($mensaje);
        }
    } else {
        $mensaje  = array(
            "warning" => "false",
            "msj" => "No se actualizo los datos",
            "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
        );
        echo json_encode($mensaje);
    }
} catch (Exception $e) {

    echo json_encode($e->getMessage());
}
