<?php
require_once('/xampp/htdocs/Grissy/database/dalPersonal.php');

    function obtenerListaDePersonal(){
        return listaDePersonal();
    }
    function iniciarSeccion($correo,$contraseña){
        return obtenerDatosDeInicioSeccion($correo,$contraseña);
    }
?>