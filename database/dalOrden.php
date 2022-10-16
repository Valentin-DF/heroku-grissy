<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/orden.php');
 require_once('/xampp/htdocs/Grissy/models/detalleOrden.php');

    function mostrarOrden($idtipo){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_ListaDeOrdenes( ? )';
        
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "i", $idtipo
        );

        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new orden();
            $obj->id = $row['id'];
            $obj->idProveedor = $row['idProveedor'];
            $obj->total =  $row['total'];
            $obj->fecha = $row['fecha'];
            $obj->igv = $row['igv'];
            $obj->subTotal = $row['subTotal'];
            $obj->codigo = $row['codigo'];
            $obj->estado = $row['estado'];
            $obj->proveedor = $row['proveedor'];
            $obj->idTipo = $row['idTipo'];
            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function generarCodigoO($tipo){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_GenerarCodigoOrden( ? )';
        
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "i", $tipo
        );

        $stmt->execute();
        $lista = array();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
    
            $obj = new codigoO();
            $obj->codigo = $row['codigo'];
            array_push($lista, $obj);
        }
        $stmt->close();
        $mysqli->close();

        return $lista;
    }

    function insertarOrden($idProveedor,$total,$igv,$subTotal,$codigo,$idTipo){
        $mysqli = conexion();

        $consultaSQL = "INSERT INTO ordenes(idProveedor,total,fecha,igv,subTotal,idTipo,codigo,estado) VALUES(?,?,now(),?,?,?,?,1)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "idddis", $idProveedor,$total,$igv,$subTotal,$idTipo,$codigo
        );

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    
    function insertarDetalleOrden($codigoOrden, $idProducto, $cantidad, $precio,$total){
        $mysqli = conexion();

        $consultaSQL = "INSERT INTO detalleorden (codigoOrden, idProducto, cantidad, precio,total,estado) VALUES(?,?,?,?,?,0)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "siidd", $codigoOrden, $idProducto, $cantidad, $precio,$total
        );

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function listarDetalleOrden($codigo){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_ListarDetallePorCodigoOrden( ? )';
        
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "s", $codigo
        );

        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new detalleOrden();
            $obj->id = $row['id'];
            $obj->idProducto = $row['idProducto'];
            $obj->nombreProducto =  $row['nombreProducto'];
            $obj->codigoOrden = $row['codigoOrden'];
            $obj->cantidad = $row['cantidad'];
            $obj->precio = $row['precio'];
            $obj->total = $row['total'];

            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }
    
    function eliminarOrdenG($id,$estado){
        $mysqli = conexion();

        $consultaSQL = "UPDATE ordenes SET estado = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",$estado,$id
        );
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function actualizarOrden($total,$igv,$subTotal,$codigo){
        $mysqli = conexion();
    
        $consultaSQL = "UPDATE ordenes SET total = ?,igv = ?, subTotal = ?  WHERE codigo = ?";
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


?>