<?php
require_once('/xampp/htdocs/Grissy/database/dalProducto.php');

    function obtenerListaDeProductos(){
        return listaDeProductos();
    }

    function eliminarProducto($id){
        return borrarProducto($id);
    }

    function guardarProducto($codigo,$nombre,$talla,$cantidad,$estado,$precio){
        return insertarProducto($codigo,$nombre,$talla,$cantidad,$estado,$precio);
    }
?>