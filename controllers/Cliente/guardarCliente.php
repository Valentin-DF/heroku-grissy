<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCliente.php');

try {

    if (isset($_POST['apellidoMaterno']) && isset($_POST['apellidoPaterno']) && isset($_POST['codigo']) && isset($_POST['condicionSunat']) && isset($_POST['docIdentidad']) && isset($_POST['estadoSunat']) &&  isset($_POST['nombre']) && isset($_POST['telefono'])) {
        $apellidoMaterno = isset($_POST['apellidoMaterno']);
        $apellidoPaterno = isset($_POST['apellidoPaterno']);
        $codigo = isset($_POST['codigo']);
        $condicionSunat = isset($_POST['condicionSunat']);
        $direccion = isset($_POST['direccion']);
        $docIdentidad = isset($_POST['docIdentidad']);
        $estadosunat = isset($_POST['estadoSunat']);
        $nombre = isset($_POST['nombre']);
        $telefono = isset($_POST['telefono']);

        echo json_encode(guardarCliente($apellidoMaterno,$apellidoPaterno,$codigo,$condicionSunat,$direccion,$docIdentidad,$estadosunat,$nombre,$telefono));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
