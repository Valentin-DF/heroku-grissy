<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCliente.php');

try {

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        eliminarCliente($id);
        $mensaje  = array(
            "warning" => "true",
            "msj" => "Se inhabilito al cliente",
            "color" => "linear-gradient(to right, #2e8f39,#8cfaa4)"
        );
        echo json_encode($mensaje);
    } else {
        $mensaje  = array(
            "warning" => "false",
            "msj" => "No se selecciono al cliente",
            "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
        );
        echo json_encode($mensaje);
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
