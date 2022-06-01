<?php
require_once('/xampp/htdocs/Grissy/database/dalArea.php');

    function obtenerListaDeArea(){
        return listaDeArea();
    }
    function obtenerListaDeAreaActivo(){
        return listaDeAreaActivo();
    }

    function eliminarArea($id,$estado){
        return borrarArea($id,$estado);
    }

    function guardarArea($codigo,$nombre,$descripcion,$foto){
        return insertarArea($codigo,$nombre,$descripcion,$foto);
    }

    function editarArea($codigo,$nombre,$descripcion,$foto){
        return actualizarArea($codigo,$nombre,$descripcion,$foto);
    }

    function buscarAreaPorId($id){
        return ObtenerAreaPorID($id);
    }

    function existenciAreaProducto($id){
        return existenciaAreaenProducto($id);
    }

    function deleteArea($id){
        return delectArea($id);
    }
     
    function exixtenciaArea($codigo){
        return validarExistencia($codigo);
    }
?>