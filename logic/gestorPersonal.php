<?php
require_once('/xampp/htdocs/Grissy/database/dalPersonal.php');

    function obtenerListaDePersonal(){
        return listaDePersonal();
    }

    function iniciarSeccion($correo,$contraseña){
        return obtenerDatosDeInicioSeccion($correo,$contraseña);
    }

    function eliminarPersonal($id,$estado){
        return borrarPersonal($id,$estado);
    }

    function guardarPersonal($codigo,$nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$idcargo,$sueldo, $correo,$contrasena,$foto){
        return insertarPersonal($codigo,$nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$idcargo,$sueldo, $correo,$contrasena,$foto);
    }
  
    function editarPersonal($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$idcargo,$sueldo, $correo,$foto){
        return ActualizarPersonal($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$idcargo,$sueldo, $correo,$foto);
    }

    function buscarPersonalPorId($id){
        return ObtenerPersonalPorID($id);
    }

    function exixtenciaPersonal($dni){
        return validarExistencia($dni);

    }

?>