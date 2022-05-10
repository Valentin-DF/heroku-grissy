<?php

require_once('/xampp/htdocs/Grissy/logic/gestorVenta.php');

try {
    if (isset($_POST['idempleado'])){
        $idempleado = $_POST['idempleado'];
        echo json_encode(obtenerCodigoVenta($idempleado), JSON_PRETTY_PRINT);

    }
} 
catch (Exception $e) {
    echo $e->getMessage();

}
