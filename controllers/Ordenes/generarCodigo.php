<?php

require_once('/xampp/htdocs/Grissy/logic/gestorOrden.php');

try {
    if (isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
        echo json_encode(obtenerCodigoOrden($tipo), JSON_PRETTY_PRINT);

    }
} 
catch (Exception $e) {
    echo $e->getMessage();

}
