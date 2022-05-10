<?php
require_once('/xampp/htdocs/Grissy/database/dalVenta.php');

    function guardarVenta($idCliente,$total,$igv,$subTotal,$idPersonal,$codigo){
        return insertarVenta($idCliente,$total,$igv,$subTotal,$idPersonal,$codigo);
    }
    
    function guardarDetalleVenta($codigoVenta, $idProducto, $cantidad, $precio,$total){
        return insertarDetalleVenta($codigoVenta, $idProducto, $cantidad, $precio,$total);
    }
    
    function obtenerListaDeDetalleVenta($codigoVenta){
        return listarDetalleVenta($codigoVenta);
    }
        
    function obtenerListaDeVentaPorPersonal($idempleado){
        return listarVentaPorPersonal($idempleado);
    }

    function obtenerCodigoVenta($idempleado){
        return generarCodigo($idempleado);
    }

    function editarVenta($total,$igv,$subTotal,$codigo){
        return actualizarVenta($total,$igv,$subTotal,$codigo);
    }

    function borrarDetalleVenta($id){
        return eliminarDetalleVenta($id);
    }

?>