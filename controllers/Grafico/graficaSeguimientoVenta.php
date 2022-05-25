<?php

require_once('/xampp/htdocs/Grissy/logic/gestorGrafico.php');

try {

    if (isset($_POST['idpersonal'])) {
        $id = $_POST['idpersonal'];
        echo json_encode(GraficoSeguimientoVentaDelPersonal($id), JSON_PRETTY_PRINT);
    }else {
        echo json_encode('No se obtuvo data');
    }
} 
catch (Exception $e) {
    echo $e->getMessage();

}
