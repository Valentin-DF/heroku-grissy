<?php
require_once('/xampp/htdocs/Grissy/database/dalOrden.php');

    function ListaDeDetalleOrdenes($tipo){
        return mostrarOrden($tipo);
    }
    function obtenerCodigoOrden($tipo){
        return generarCodigoO($tipo);
    }
    
    function guardarOrden($idProveedor,$total,$igv,$subTotal,$codigo,$idTipo){
        return insertarOrden($idProveedor,$total,$igv,$subTotal,$codigo,$idTipo);
    }

    function guardarDetalleOrden($codigoOrden, $idProducto, $cantidad, $precio,$total){
        return insertarDetalleOrden($codigoOrden, $idProducto, $cantidad, $precio,$total);
    }

    function obtenerListaDeDetalleOrden($codigo){
        return listarDetalleOrden($codigo);
    }
        
    function eliminarOrden($id, $estado){
        return eliminarOrdenG($id, $estado);
    }
    
    function editarOrden($total,$igv,$subTotal,$codigo){
        return actualizarOrden($total,$igv,$subTotal,$codigo);
    }
?>