<?php
require_once('/xampp/htdocs/Grissy/database/dalProducto.php');

    function obtenerListaDeProductos(){
        return listaDeProductos();
    }

    function obtenerListaDeTipoProductos(){
        return listaDeTipoProductos();
    }

    function eliminarProducto($id, $estado){
        return borrarProducto($id, $estado);
    }

    function guardarProducto($codigo, $nombre, $talla, $cantidad, $estado, $precio, $idArea, $idProducto, $idTipo){
        return insertarProducto($codigo, $nombre, $talla, $cantidad, $estado, $precio, $idArea, $idProducto, $idTipo);
    }

    function editarProducto($codigo,$nombre,$talla,$cantidad,$precio){
        return ActualizarProducto($codigo,$nombre,$talla,$cantidad,$precio);
    }

    function buscarProductoPorId($id){
        return ObtenerProductoPorID($id);
    }

    function buscarProductoPorNombre($nombrePro){
        return ObtenerProductoPorNombre($nombrePro);
    }
    function buscarProductoPorNombreTipo($nombrePro,$idTipo){
        return ObtenerProductoPorNombreTipo($nombrePro,$idTipo);
    }
    
    function buscarProductoPorNombre2($nombrePro){
        return ObtenerProductoPorNombre2($nombrePro);
    }
    function actualizarStock($id,$cantidad){
        return ActualizarStockProducto($id,$cantidad);
    }

    function exixtenciaProducto($codigo){
        return validarExistencia($codigo);

    }

    function existenciaProductoDetalleenVenta($id){
        return existenciaProductoDetalleVenta($id);
    }

    function delecteProducto($id){
        return delectProducto($id);
    }

?>