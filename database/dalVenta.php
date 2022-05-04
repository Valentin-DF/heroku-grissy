<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/venta.php');


    function insertarVenta($idCliente,$total,$igv,$subTotal,$idPersonal,$codigo){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "INSERT INTO venta(idCliente,total,fecha,igv,subTotal,idPersonal,codigo,estado) VALUES(?,?,now(),?,?,?,?,1)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "idddi", $idCliente,$total,$igv,$subTotal,$idPersonal,$codigo
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }

?>