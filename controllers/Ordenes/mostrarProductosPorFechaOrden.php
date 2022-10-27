<?php

require_once('/xampp/htdocs/Grissy/logic/gestorOrden.php');

try {
    if (isset($_GET['idproducto'])){
        $idproducto = $_GET['idproducto'];
        echo json_encode(listaProductoOrden($idproducto), JSON_PRETTY_PRINT);
    }

} 
catch (Exception $e) {
    echo $e->getMessage();

}
