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

    function buscarPersonalPorDocumento($documento){
        return ObtenerPersonalPorDocumento($documento);
    }

    function exixtenciaPersonal($dni){
        return validarExistencia($dni);

    }

    function editarPerfil($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $contacto, $direccion,  $correo, $foto, $contrasena){
        return actualizarPerfil($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $contacto, $direccion,  $correo, $foto, $contrasena);
    }

    function existenciaPersonalenVenta($id){
        return existenciaPersonalVenta($id);
    }

    function delectePersonal($id){
        return delectPersonal($id);
    }

    function personalSinPagarEnElMEs(){
        return obtenerSinPagarEnElMes();
    }
    
    function  GuardarRegistroSalarioDelMes($idpersonal,  $salariobase,$bonificacionextra,$descuentos,$totalsueldo){
        return insertarSalrioDelMes($idpersonal,  $salariobase,$bonificacionextra,$descuentos,$totalsueldo);
    }

?>