<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPersonal.php');

try {

    if (isset($_POST['codigo']) && isset($_POST['nombre']) && isset($_POST['apellidoMaterno']) && isset($_POST['apellidoPaterno']) && isset($_POST['dni']) && 
        isset($_POST['contacto']) &&  isset($_POST['direccion']) && isset($_POST['cargo'])&& isset($_POST['sueldo'])&& isset($_POST['correo'])&& isset($_POST['foto'])) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $dni = $_POST['dni'];
        $contacto = $_POST['contacto'];
        $direccion = $_POST['direccion'];
        $cargo = $_POST['cargo'];
        $sueldo = $_POST['sueldo'];
        $correo = $_POST['correo'];
        $foto = $_POST['foto'];
        
        echo json_encode(editarPersonal($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$foto));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
