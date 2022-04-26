<?php
require_once('/xampp/htdocs/Grissy/database/dalArea.php');

    function obtenerListaDeArea(){
        return listaDeArea();
    }

    function eliminarArea($id){
        return borrarArea($id);
    }

    function guardarArea($codigo,$nombre,$descripcion,$foto){
        return insertarArea($codigo,$nombre,$descripcion,$foto);
    }

    function editarArea($id,$nombre,$descripcion,$foto){
        return actualizarArea($id,$nombre,$descripcion,$foto);
    }

?>