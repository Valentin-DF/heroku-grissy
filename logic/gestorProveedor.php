<?php
require_once('/xampp/htdocs/Grissy/database/dalProveedor.php');

    function obtenerListaDeProveedor(){
        return listaDeProveedor();
    }

    function eliminarProveedor($id,$estado){
        return borrarProveedor($id,$estado);
    }

    function guardarProveedor($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        return insertarProveedor($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat);
    }
  
    function editarProveedor($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        return actualizarProveedor($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat);
    }
    
    function buscarProveedorPorId($id){
        return ObtenerProveedorPorID($id);
    }
    function buscarProveedorPorDocIdentidad($docIdentidad){
        return ObtenerProveedorPorDocIdentidad($docIdentidad);
    }

    function exixtenciaProveedor($docIdentidad){
        return validarExistencia($docIdentidad);

    }

    function delecteProveedor($id){
        return delectProveedor($id);
    }

?>