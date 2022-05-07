<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/producto.php');

    function listaDeProductos(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM producto_e';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new producto();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->cantidad = $row['cantidad'];
            $obj->precio = $row['precio'];
            $obj->codigo = $row['codigo'];
            $obj->talla = $row['talla'];
            $obj->estado = $row['estado'];
            $obj->idarea = $row['idarea'];
            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function borrarProducto($id){
        $mysqli = conexion();
        $resultado = 0;
    
        $consultaSQL = "UPDATE producto_e SET estado = 0 WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "i",
            $id
        );
    
        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $resultado;
    }

    function insertarProducto($codigo,$nombre,$talla,$cantidad,$estado,$precio,$idArea){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "INSERT INTO producto_e(codigo, nombre, talla, cantidad, precio, estado, idArea) VALUES(?,?,?,?,?,1,?)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "sssidi", $codigo,$nombre,$talla,$cantidad,$precio,$idArea
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }

    function ActualizarProducto($codigo,$nombre,$talla,$cantidad,$precio){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "UPDATE producto_e SET nombre = ?,talla = ?,cantidad = ?,precio = ? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssids",$nombre,$talla,$cantidad,$precio,$codigo
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }

    function ObtenerProductoPorID($id){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM producto_e WHERE id = ?';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
    
            $obj = new producto();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->cantidad = $row['cantidad'];
            $obj->precio = $row['precio'];
            $obj->codigo = $row['codigo'];
            $obj->talla = $row['talla'];
            $obj->estado = $row['estado'];
            $obj->idarea = $row['idarea'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }
    function ObtenerProductoPorNombre($nombrePro){
        $mysqli = conexion();
        $consultaSQL = " CALL grissy_ListarProductoPorNombre( ? ); ";
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "s",
            $nombrePro
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
    
            $obj = new producto();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->cantidad = $row['cantidad'];
            $obj->precio = $row['precio'];
            $obj->codigo = $row['codigo'];
            $obj->talla = $row['talla'];
            $obj->estado = $row['estado'];
            $obj->idarea = $row['idarea'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }
    function ObtenerProductoPorNombre2($nombrePro){
        $mysqli = conexion();
        $consultaSQL = " CALL grissy_ListarProductoSinLimitePorNombre( ? ); ";
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "s",
            $nombrePro
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
    
            $obj = new producto();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->cantidad = $row['cantidad'];
            $obj->precio = $row['precio'];
            $obj->codigo = $row['codigo'];
            $obj->talla = $row['talla'];
            $obj->estado = $row['estado'];
            $obj->idarea = $row['idarea'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }
    function ActualizarStockProducto($id,$cantidad){
        $mysqli = conexion();
        $resultado = 0;
    
        $consultaSQL = "UPDATE producto_e SET cantidad = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",
            $cantidad,$id
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
