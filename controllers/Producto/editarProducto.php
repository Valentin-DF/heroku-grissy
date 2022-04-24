<?php

require_once('/xampp/htdocs/Grissy/logic/gestorProducto.php');

try {

    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['talla']) && isset($_POST['cantidad']) && isset($_POST['precio'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $talla = $_POST['talla'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];

        echo json_encode(editarProducto($id, $nombre, $talla, $cantidad, $precio));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
