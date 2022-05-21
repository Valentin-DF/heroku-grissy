<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCliente.php');


try {
    if (isset($_POST['apellidoMaterno']) && isset($_POST['apellidoPaterno']) && isset($_POST['codigo']) && isset($_POST['condicionSunat']) && isset($_POST['docIdentidad']) && isset($_POST['estadoSunat']) &&  isset($_POST['nombre']) && isset($_POST['telefono'])) {

        if ($_POST['codigo'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "El codigo es incorrecto",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else if ((strlen($_POST['docIdentidad']) != 8) and (strlen($_POST['docIdentidad']) != 11)) {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "El Doc.Identidad es incorrecto",
                "color" => "linear-gradient(to right, #ff5c74, #e30e2e )"
            );
            echo json_encode($mensaje);
        } else  if (exixtenciaCliente($_POST['docIdentidad']) == 1 ) {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "El cliente ya se encuentra registrado",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } if ($_POST['nombre'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "Asigne un nombre al cliente",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else {

            $apellidoMaterno = $_POST['apellidoMaterno'];
            $apellidoPaterno = $_POST['apellidoPaterno'];
            $codigo = $_POST['codigo'];
            $condicionSunat = $_POST['condicionSunat'];
            $direccion = $_POST['direccion'];
            $docIdentidad = $_POST['docIdentidad'];
            $estadoSunat = $_POST['estadoSunat'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];


            guardarCliente($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $docIdentidad, $direccion, $telefono, $estadoSunat, $condicionSunat);

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
