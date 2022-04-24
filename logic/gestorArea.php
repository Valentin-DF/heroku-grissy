<?php
require_once('/xampp/htdocs/Grissy/database/dalArea.php');

    function obtenerListaDeArea(){
        return listaDeArea();
    }

    function eliminarArea($id){
        return borrarArea($id);
    }

    function guardarArea($codigo,$nombre){
        return insertarArea($codigo,$nombre);
    }

    function editarArea($id,$nombre){
        return eliminarArea($id,$nombre);
    }

?>