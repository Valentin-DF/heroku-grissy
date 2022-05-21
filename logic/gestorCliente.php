<?php
require_once('/xampp/htdocs/Grissy/database/dalCliente.php');

    function obtenerListaDeClientes(){
        return listaDeClientes();
    }

    function eliminarCliente($id,$estado){
        return borrarCliente($id,$estado);
    }

    function guardarCliente($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        return insertarCliente($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat);
    }
  
    function editarCliente($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        return actualizarCliente($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat);
    }
    
    function buscarClientePorId($id){
        return ObtenerClientePorID($id);
    }
    function buscarClientePorDocIdentidad($docIdentidad){
        return ObtenerClientePorDocIdentidad($docIdentidad);
    }
    
    function buscarClientePorDocIdentidad2($docIdentidad){
        return ObtenerClientePorDocIdentidad2($docIdentidad);
    }

    function exixtenciaCliente($docIdentidad){
        return validarExistencia($docIdentidad);

    }

?>