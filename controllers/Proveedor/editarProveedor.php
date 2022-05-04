<?php

require_once('/xampp/htdocs/Grissy/logic/gestorProveedor.php');

try {

    if (isset($_POST['apellidoMaterno']) && isset($_POST['apellidoPaterno']) && isset($_POST['codigo']) && isset($_POST['condicionSunat']) && isset($_POST['docIdentidad']) && isset($_POST['estadoSunat']) &&  isset($_POST['nombre']) && isset($_POST['telefono'])) {
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $codigo = $_POST['codigo'];
        $condicionSunat = $_POST['condicionSunat'];
        $direccion = $_POST['direccion'];
        $docIdentidad = $_POST['docIdentidad'];
        $estadoSunat = $_POST['estadoSunat'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        
        echo json_encode(editarProveedor($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
