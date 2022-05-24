<?php
require_once('/xampp/htdocs/Grissy/database/dalProductoG.php');

    function obtenerListaDeProductoG(){
        return listaDeProductoGActivos();
    }

    function obtenerListaDeProductoGeneral(){
        return listaDeProductoGeneral();
    }
    function eliminarProductoG($id, $estado){
        return borrarProductoG($id, $estado);
    }

    function guardarProductoG($codigo, $nombre){
        return insertarProductoG($codigo, $nombre);
    }

    function editarProductoG($codigo,$nombre){
        return ActualizarProductoG($codigo,$nombre);
    }

?>