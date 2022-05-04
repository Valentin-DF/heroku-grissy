<?php
require_once('/xampp/htdocs/Grissy/database/dalVenta.php');

    function guardarVenta($idCliente,$total,$igv,$subTotal,$idPersonal,$codigo){
        return insertarVenta($idCliente,$total,$igv,$subTotal,$idPersonal,$codigo);
    }

?>