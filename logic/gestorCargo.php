<?php
require_once('/xampp/htdocs/Grissy/database/dalCargo.php');

    function obtenerListaDeCargo(){
        return listaDeCargo();
    }

    function eliminarCargo($id,$estado){
        return borrarCargo($id,$estado);
    }

    function guardarCargo($codigo,$nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$contrasena,$foto){
        return insertarCargo($codigo,$nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$contrasena,$foto);
    }
  
    function editarCargo($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$foto){
        return ActualizarCargo($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$foto);
    }

    function buscarCargoPorId($id){
        return ObtenerCargoPorID($id);
    }



?>