<?php

require_once('/xampp/htdocs/Grissy/logic/gestoIngresoCaja.php');

try {

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

            $mensaje  = array(
                "warning" => "true",
                "msj" => "Se elimino el area",
                "color" => "linear-gradient(to right, #2e8f39,#8cfaa4)"
            );
            deleteIngresoCaja($id);
            echo json_encode($mensaje);

    } else {
        $mensaje  = array(
            "warning" => "false",
            "msj" => "No se selecciono el area",
            "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
        );
        echo json_encode($mensaje);
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
