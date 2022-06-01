<?php

require_once('/xampp/htdocs/Grissy/logic/gestorProductoG.php');

try {

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        if (existenciaProductoGenProductoE($id) == '0') {
            $mensaje  = array(
                "warning" => "true",
                "msj" => "Se elimino el producto",
                "color" => "linear-gradient(to right, #2e8f39,#8cfaa4)"
            );
            deleteProductoG($id);
            echo json_encode($mensaje);
        }else{
            $mensaje  = array(
                "warning" => "true",
                "msj" => "El cargo se encuentra referenciado en producto empresa",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        }
    } else {
        $mensaje  = array(
            "warning" => "false",
            "msj" => "No se selecciono el producto",
            "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
        );
        echo json_encode($mensaje);
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
