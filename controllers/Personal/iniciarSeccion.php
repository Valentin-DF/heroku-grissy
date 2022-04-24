<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPersonal.php');

try {

    if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        echo json_encode(iniciarSeccion($correo, $contrasena));
        
    } else {
        echo json_encode('Error');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
