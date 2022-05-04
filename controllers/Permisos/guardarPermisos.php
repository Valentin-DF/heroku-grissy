<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPermisos.php');

try {

    if (isset($_POST['idpersonal']) && isset($_POST['p_grissyVenta']) && isset($_POST['p_grissyVenta']) && isset($_POST['p_grissyCliente']) && isset($_POST['p_grissyConfiguraciones'])
    && isset($_POST['p_grissyProductoEmp']) && isset($_POST['p_grissyPersonal']) && isset($_POST['p_grissyProveedor'])) {
        $idpersonal = $_POST['idpersonal'];
        $p_grissyVenta = $_POST['p_grissyVenta'];
        $p_grissyArea = $_POST['p_grissyArea'];
        $p_grissyCliente = $_POST['p_grissyCliente'];
        $p_grissyConfiguraciones = $_POST['p_grissyConfiguraciones'];
        $p_grissyProductoEmp = $_POST['p_grissyProductoEmp'];
        $p_grissyPersonal = $_POST['p_grissyPersonal'];
        $p_grissyProveedor = $_POST['p_grissyProveedor'];

        echo json_encode(guardarPermisos($idpersonal,$p_grissyVenta,$p_grissyArea,$p_grissyCliente,$p_grissyConfiguraciones,$p_grissyProductoEmp,$p_grissyPersonal,$p_grissyProveedor));
    }else {
        echo json_encode('No se obtuvo data');
    }
} 
catch (Exception $e) {
    echo $e->getMessage();

}
