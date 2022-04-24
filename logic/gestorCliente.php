<?php
require_once('/xampp/htdocs/Grissy/database/dalCliente.php');

    function obtenerListaDeClientes(){
        return listaDeClientes();
    }

    function eliminarCliente($id){
        return borrarCliente($id);
    }

    function guardarCliente($apellidoMaterno,$apellidoPaterno,$codigo,$condicionSunat,$direccion,$docIdentidad,$estadosunat,$nombre,$telefono){
        return insertarCliente($apellidoMaterno,$apellidoPaterno,$codigo,$condicionSunat,$direccion,$docIdentidad,$estadosunat,$nombre,$telefono);
    }
  
    function editarCliente($apellidoMaterno,$apellidoPaterno,$id,$condicionSunat,$direccion,$docIdentidad,$estadosunat,$nombre,$telefono){
        return actualizarCliente($apellidoMaterno,$apellidoPaterno,$id,$condicionSunat,$direccion,$docIdentidad,$estadosunat,$nombre,$telefono);
    }
    
?>