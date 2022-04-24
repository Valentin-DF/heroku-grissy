<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPersonal.php');

try {

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        echo json_encode(eliminarPersonal($id));
    } else {
        echo json_encode('No se recibió el id');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
