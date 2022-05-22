<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPersonal.php');

try {

    if (isset($_POST['id']) && isset($_POST['estado'])) {
        $id = $_POST['id'];
        $estado = $_POST['estado'];

        if ($_POST['estado'] == 1) {
            $mensaje  = array(
                "warning" => "true",
                "msj" => "Se habilito al personal",
                "color" => "linear-gradient(to right, #2e8f39,#8cfaa4)"
            );
            eliminarPersonal($id, $estado);
            echo json_encode($mensaje);
        } else {
            $mensaje  = array(
                "warning" => "true",
                "msj" => "Se inhabilito al personal",
                "color" => "linear-gradient(to right, #2e8f39,#8cfaa4)"
            );
            eliminarPersonal($id, $estado);
            echo json_encode($mensaje);
        }
    } else {
        $mensaje  = array(
            "warning" => "false",
            "msj" => "No se selecciono al personal",
            "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
        );
        echo json_encode($mensaje);
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
