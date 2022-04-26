<?php

require_once('/xampp/htdocs/Grissy/logic/gestorProducto.php');

try {

    if (isset($_POST['codigo']) && isset($_POST['nombre']) && isset($_POST['talla']) && isset($_POST['cantidad']) && isset($_POST['estado']) && isset($_POST['precio'])&& isset($_POST['idArea'])) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $talla = $_POST['talla'];
        $cantidad = $_POST['cantidad'];
        $estado = $_POST['estado'];
        $precio = $_POST['precio'];
        $idArea = $_POST['idArea'];

        echo json_encode(guardarProducto($codigo, $nombre, $talla, $cantidad, $estado, $precio,$idArea));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
