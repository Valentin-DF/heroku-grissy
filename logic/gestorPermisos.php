<?php
require_once('/xampp/htdocs/Grissy/database/dalPermisos.php');

    function obtenerListaDePermisos(){
        return listaDePermisos();
    }

    function guardarPermisos($idpersonal,$p_grissyVenta,$p_grissyArea,$p_grissyCliente,$p_grissyConfiguraciones,$p_grissyProductoEmp,$p_grissyPersonal,$p_grissyProveedor){
        return insertarPermisos($idpersonal,$p_grissyVenta,$p_grissyArea,$p_grissyCliente,$p_grissyConfiguraciones,$p_grissyProductoEmp,$p_grissyPersonal,$p_grissyProveedor);
    }

    function editarPermisos($idpersonal,$p_grissyVenta,$p_grissyArea,$p_grissyCliente,$p_grissyConfiguraciones,$p_grissyProductoEmp,$p_grissyPersonal,$p_grissyProveedor){
        return ActualizarPermisos($idpersonal,$p_grissyVenta,$p_grissyArea,$p_grissyCliente,$p_grissyConfiguraciones,$p_grissyProductoEmp,$p_grissyPersonal,$p_grissyProveedor);
    }

    function buscarPermisosPorPersonal($idpersonal){
        return ObtenerPermisosPorPersonal($idpersonal);
    }
?>
