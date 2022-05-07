<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/venta.php');
 require_once('/xampp/htdocs/Grissy/models/detalleVenta.php');

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

    function insertarDetalleVenta($codigoVenta, $idProducto, $cantidad, $precio,$total){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "INSERT INTO detalleventa (codigoVenta, idProducto, cantidad, precio,total) VALUES(?,?,?,?,?)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "siidd", $codigoVenta, $idProducto, $cantidad, $precio,$total
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }
    
    function listarDetalleVenta($codigoVenta){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_ListarDetallePorCodigoVenta( ? )';
        
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "s", $codigoVenta
        );

        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new detalleVenta();
            $obj->id = $row['id'];
            $obj->idProducto = $row['idProducto'];
            $obj->nombreProducto =  $row['nombreProducto'];
            $obj->codigoVenta = $row['codigoVenta'];
            $obj->cantidad = $row['cantidad'];
            $obj->precio = $row['precio'];
            $obj->total = $row['total'];

            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function listarVentaPorPersonal($idempleado){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_ListarVentaPorPersonal( ? )';
        
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "i", $idempleado
        );

        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new venta();
            $obj->id = $row['id'];
            $obj->idCliente = $row['idCliente'];
            $obj->total =  $row['total'];
            $obj->fecha = $row['fecha'];
            $obj->igv = $row['igv'];
            $obj->subTotal = $row['subTotal'];
            $obj->idPersonal = $row['idPersonal'];
            $obj->codigo = $row['codigo'];
            $obj->estado = $row['estado'];

            $obj->cliente = $row['cliente'];
            $obj->personal = $row['personal'];
            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

?>