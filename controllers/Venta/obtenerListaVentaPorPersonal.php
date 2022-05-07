<?php

require_once('/xampp/htdocs/Grissy/logic/gestorVenta.php');

try {
    if (isset($_GET['idempleado'])){
        $idempleado = $_GET['idempleado'];
        echo json_encode(obtenerListaDeVentaPorPersonal($idempleado), JSON_PRETTY_PRINT);

    }
} 
catch (Exception $e) {
    echo $e->getMessage();

}
