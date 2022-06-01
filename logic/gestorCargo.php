<?php
require_once('/xampp/htdocs/Grissy/database/dalCargo.php');

    function obtenerListaDeCargo(){
        return listaDeCargo();
    }

    function eliminarCargo($id,$estado){
        return borrarCargo($id,$estado);
    }

    function guardarCargo($codigo,$nombre, $principal,$secundario){
        return insertarCargo($codigo,$nombre, $principal,$secundario);
    }
  
    function editarCargo($codigo, $nombre, $principal,$secundario){
        return ActualizarCargo($codigo, $nombre, $principal,$secundario);
    }

    function buscarCargoPorId($id){
        return ObtenerCargoPorID($id);
    }

    function existenciaCargoPersonal($id){
        return existenciaCargoenPersonal($id);
    }

    function deleteCargo($id){
        return delectCargo($id);
    }

    function exixtenciaCargo($codigo){
        return validarExistencia($codigo);

    }

?>