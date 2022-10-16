<?php

require_once('/xampp/htdocs/Grissy/logic/gestorProducto_Servicio.php');

try {

    if (isset($_POST['codigo']) && isset($_POST['nombre'])) {

        if (exixtenciaProducto_Servicio($_POST['codigo']) == 1){
            $mensaje  = array(
                "warning" => "false",
                "msj" => "El codigo se encuentra en uso",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        }else if ($_POST['codigo'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "Necesita Colocar un codigo al producto",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else if ($_POST['nombre'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "Necesita Colocar un nombre al producto",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else if ($_POST['idProducto'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "Seleccione un producto como referencia",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else if ($_POST['idArea'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "Seleccione un area como referencia",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else
        {

            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $estado = $_POST['estado'];
            $idArea = $_POST['idArea'];
            $idProducto = $_POST['idProducto'];
            $idTipo = $_POST['idTipo'];

            $id = guardarProducto_Servicio($codigo, $nombre,  $estado,  $idArea, $idProducto,$idTipo);
            
            $mensaje  = array(
                "warning" => "true",
                "msj" => "Se guardo correctamente",
                "id" => $id,
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
