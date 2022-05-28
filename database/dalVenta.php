<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/venta.php');
 require_once('/xampp/htdocs/Grissy/models/detalleVenta.php');

    function insertarVenta($idCliente,$total,$igv,$subTotal,$idPersonal,$codigo){
        $mysqli = conexion();

        $consultaSQL = "INSERT INTO venta(idCliente,total,fecha,igv,subTotal,idPersonal,codigo,estado) VALUES(?,?,now(),?,?,?,?,1)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "idddis", $idCliente,$total,$igv,$subTotal,$idPersonal,$codigo
        );

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function insertarDetalleVenta($codigoVenta, $idProducto, $cantidad, $precio,$total){
        $mysqli = conexion();

        $consultaSQL = "INSERT INTO detalleventa (codigoVenta, idProducto, cantidad, precio,total,estado) VALUES(?,?,?,?,?,0)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "siidd", $codigoVenta, $idProducto, $cantidad, $precio,$total
        );

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
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

    function generarCodigo($idPersonal){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_GenerarCodigoVenta( ? )';
        
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "i", $idPersonal
        );

        $stmt->execute();
        $lista = array();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
    
            $obj = new codigo();
            $obj->codigo = $row['codigo'];
            array_push($lista, $obj);
        }
        $stmt->close();
        $mysqli->close();

        return $lista;
    }

    function ActualizarVenta($total,$igv,$subTotal,$codigo){
        $mysqli = conexion();
    
        $consultaSQL = "UPDATE venta SET total = ?,igv = ?, subTotal = ?  WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ddds",
            $total,$igv,$subTotal,$codigo
        );
    
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }



    function eliminarDetalleVenta($id){
        $mysqli = conexion();
    
        $consultaSQL = "DELETE FROM detalleventa WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "i",
            $id
        );
    
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function obtenerVentasEstado($idempleado,$estado){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_ListarVentaPorEstado( ? , ? )';
        
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ii", $idempleado,$estado
        );

        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new venta();
            $obj->id = $row['id'];
            $obj->total =  $row['total'];
            $obj->fecha = $row['fecha'];
            $obj->igv = $row['igv'];
            $obj->subTotal = $row['subTotal'];
            $obj->codigo = $row['codigo'];
            $obj->cliente = $row['cliente'];

            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function cancelar($codigoVenta){
        $mysqli = conexion();
        $consultaSQL = 'DELETE FROM detalleventa WHERE codigoVenta = ? and  estado = 0';
        
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "s", $codigoVenta
        ); 

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }


    function eliminarVentaG($id,$estado){
        $mysqli = conexion();

        $consultaSQL = "UPDATE venta SET estado = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",$estado,$id
        );
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }
?>