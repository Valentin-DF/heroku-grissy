<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCliente.php');

try {

    if ( isset($_POST['dni'])) {

        $dni = $_POST['dni'];

        
        echo json_encode(exixtenciaPersonal($dni));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
