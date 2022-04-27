<?php
require_once('/xampp/htdocs/Grissy/database/dalCliente.php');

    function obtenerListaDeClientes(){
        return listaDeClientes();
    }

    function eliminarCliente($id){
        return borrarCliente($id);
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

?>