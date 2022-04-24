<?php
require_once('/xampp/htdocs/Grissy/database/dalPersonal.php');

    function obtenerListaDePersonal(){
        return listaDePersonal();
    }

    function iniciarSeccion($correo,$contraseña){
        return obtenerDatosDeInicioSeccion($correo,$contraseña);
    }

    function eliminarPersonal($id){
        return borrarPersonal($id);
    }

    function guardarPersonal($codigo,$nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$contrasena,$foto){
        return insertarPersonal($codigo,$nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$contrasena,$foto);
    }
  
    function editarPersonal($id, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$foto){
        return ActualizarPersonal($id, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$foto);
    }

?>