<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPersonal.php');

try {

    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellidoMaterno']) && isset($_POST['apellidoPaterno']) && isset($_POST['dni']) && 
        isset($_POST['contacto']) &&  isset($_POST['direccion']) && isset($_POST['cargo'])&& isset($_POST['sueldo'])&& isset($_POST['correo'])&& isset($_POST['foto'])) {
        $id = isset($_POST['id']);
        $nombre = isset($_POST['nombre']);
        $apellidoMaterno = isset($_POST['apellidoMaterno']);
        $apellidoPaterno = isset($_POST['apellidoPaterno']);
        $dni = isset($_POST['dni']);
        $contacto = isset($_POST['contacto']);
        $direccion = isset($_POST['direccion']);
        $cargo = isset($_POST['cargo']);
        $sueldo = isset($_POST['sueldo']);
        $correo = isset($_POST['correo']);
        $foto = isset($_POST['foto']);
        
        echo json_encode(editarPersonal($id, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$foto));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
