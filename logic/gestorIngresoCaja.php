<?php
require_once('/xampp/htdocs/Grissy/database/dalIngresoCaja.php');

    function obtenerListaDeIngresoCaja(){
        return listaDeIngresoCaja();
    }
    function obtenerListaDeIngresoCajaActivo(){
        return listaDeIngresoCajaActivo();
    }

    function eliminarIngresoCaja($id,$estado){
        return borrarIngresoCaja($id,$estado);
    }

    function guardarIngresoCaja($monto,$tipo,$codigo){
        return insertarIngresoCaja($monto,$tipo,$codigo);
    }

    function editarIngresoCaja($monto,$codigo){
        return ActualizarIngresoCaja($monto,$codigo);
    }

    function buscarIngresoCajaPorId($id){
        return ObtenerIngresoCajaPorID($id);
    }



    function deleteIngresoCaja($id){
        return delectIngresoCaja($id);
    }
     
    function exixtenciaIngresoCaja($codigo){
        return validarExistencia($codigo);
    }
?>