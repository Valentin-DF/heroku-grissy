<?php
require_once('/xampp/htdocs/Grissy/database/dalProducto.php');

    function obtenerListaDeProductos(){
        return listaDeProductos();
    }

    function eliminarProducto($id){
        return borrarProducto($id);
    }

    function guardarProducto($codigo,$nombre,$talla,$cantidad,$estado,$precio,$idArea){
        return insertarProducto($codigo,$nombre,$talla,$cantidad,$estado,$precio,$idArea);
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

?>