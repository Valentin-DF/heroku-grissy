<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/librodiario.php');

    function obtenerLibroDiario($fecha){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissyContable_ListaLibroDiarios( ? )';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "s",
            $fecha
        );
        $stmt->execute();

        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            $obj = new librodiario();
            $obj->descripcion = $row['descripcion'];
            $obj->debe = $row['debe'];
            $obj->haber = $row['haber'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();

        return $lista; 
    }
?>