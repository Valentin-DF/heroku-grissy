<?php

require_once('/xampp/htdocs/Grissy/logic/gestorIngresoEgreso.php');

try {

    if (isset($_GET['fechafin']) && isset($_GET['fechainicio']) && isset($_GET['fechames_ano'])) {
        $fechafin = $_GET['fechafin'];
        $fechainicio = $_GET['fechainicio'];
        $fechames_ano = $_GET['fechames_ano'];
        echo json_encode(listaIngresos($fechafin,$fechainicio,$fechames_ano), JSON_PRETTY_PRINT);
    }else {
        echo json_encode('No se obtuvo data');
    }

} 
catch (Exception $e) {
    echo $e->getMessage();

}
