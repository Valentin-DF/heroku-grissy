<?php
require_once('/xampp/htdocs/Grissy/database/dalReporte.php');

    function  obtenerEntradaSalida($fechaInicio, $fechaFinal, $idEncargado, $idArea, $idProducto){
        return  reporteEntradaSalida($fechaInicio, $fechaFinal, $idEncargado, $idArea, $idProducto);
    }
    function  listaEntradaSalida(){
        return  listarEntradaSalisa();
    }
    function  obtenerVenta($fechaInicio,$fechaFinal,$idEncargado){
        return  reporteVenta($fechaInicio,$fechaFinal,$idEncargado);
    }
    function  listaVenta(){
        return  listarVenta();
    }
    function  IngresarEntradaSalida($idEncargado,$idArea,$idProducto,$monto,$condicion){
        return  registrarEntradaSalida($idEncargado,$idArea,$idProducto,$monto,$condicion);
    }

?>