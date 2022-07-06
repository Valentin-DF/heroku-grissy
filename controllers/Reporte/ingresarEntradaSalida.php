<?php

require_once('/xampp/htdocs/Grissy/logic/gestorReporte.php');

try {

    if ( isset($_POST['idEncargado']) && isset($_POST['idArea']) && isset($_POST['idProducto']) && isset($_POST['monto']) &&  isset($_POST['condicion']))  {
        $monto = $_POST['monto'];
        $idEncargado = $_POST['idEncargado'];
        $idArea = $_POST['idArea'];
        $idProducto = $_POST['idProducto'];
        $condicion= $_POST['condicion'];

        IngresarEntradaSalida($idEncargado,$idArea,$idProducto,$monto,$condicion);
        // 1=>entrada
        // 0=>salida
    } else {
        echo json_encode('No se obtuvo data');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
