<?php
require_once('/xampp/htdocs/Grissy/database/dalIngresoEgreso.php');

    function listaIngresos($fechafin,$fechainicio,$fechames_ano){
        return obtenerIngresos($fechafin,$fechainicio,$fechames_ano);
    }
    function listaGastos($fechafin,$fechainicio,$fechames_ano){
        return obtenerGastos($fechafin,$fechainicio,$fechames_ano);
    }

?>