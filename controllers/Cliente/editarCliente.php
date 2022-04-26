<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCliente.php');

try {

    if (isset($_POST['apellidoMaterno']) && isset($_POST['apellidoPaterno']) && isset($_POST['id']) && isset($_POST['condicionSunat']) && isset($_POST['docIdentidad']) && isset($_POST['estadoSunat']) &&  isset($_POST['nombre']) && isset($_POST['telefono'])) {
        $apellidoMaterno = isset($_POST['apellidoMaterno']);
        $apellidoPaterno = isset($_POST['apellidoPaterno']);
        $id = isset($_POST['id']);
        $condicionSunat = isset($_POST['condicionSunat']);
        $direccion = isset($_POST['direccion']);
        $docIdentidad = isset($_POST['docIdentidad']);
        $estadoSunat = isset($_POST['estadoSunat']);
        $nombre = isset($_POST['nombre']);
        $telefono = isset($_POST['telefono']);

        
        echo json_encode(editarCliente($apellidoMaterno,$apellidoPaterno,$id,$condicionSunat,$direccion,$docIdentidad,$estadoSunat,$nombre,$telefono));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
