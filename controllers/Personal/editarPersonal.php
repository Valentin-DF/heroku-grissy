<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPersonal.php');

try {

    if (
        isset($_POST['codigo']) && isset($_POST['nombre']) && isset($_POST['apellidoMaterno']) && isset($_POST['apellidoPaterno']) && isset($_POST['dni']) &&
        isset($_POST['contacto']) &&  isset($_POST['direccion']) && isset($_POST['idcargo']) && isset($_POST['sueldo']) && isset($_POST['correo']) && isset($_POST['foto'])
    ) {

        if ($_POST['codigo'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "El codigo es incorrecto",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else if ((strlen($_POST['dni']) != 8)) {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "El Doc.Identidad es incorrecto",
                "color" => "linear-gradient(to right, #ff5c74, #e30e2e )"
            );
            echo json_encode($mensaje);
        } else if ($_POST['nombre'] == "") {
            $mensaje  = array(
                "warning" => "false",
                "msj" => "Asigne un nombre al personal",
                "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
            );
            echo json_encode($mensaje);
        } else {

            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $apellidoMaterno = $_POST['apellidoMaterno'];
            $apellidoPaterno = $_POST['apellidoPaterno'];
            $dni = $_POST['dni'];
            $contacto = $_POST['contacto'];
            $direccion = $_POST['direccion'];
            $idcargo = $_POST['idcargo'];
            $sueldo = $_POST['sueldo'];
            $correo = $_POST['correo'];
            $foto = $_POST['foto'];

            editarPersonal($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto, $direccion, $idcargo, $sueldo, $correo, $foto);

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
