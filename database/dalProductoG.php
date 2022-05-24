<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/productoG.php');

    function listaDeProductoGeneral(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM producto_g';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new productoG();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->estado = $row['estado'];
            $obj->codigo = $row['codigo'];

            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }
    function listaDeProductoGActivos(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM producto_g WHERE  estado = 1';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new productoG();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->estado = $row['estado'];
            $obj->codigo = $row['codigo'];

            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function borrarProductoG($id, $estado){
        $mysqli = conexion();
    
        $consultaSQL = "UPDATE producto_g SET estado = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",$estado,$id
        );
    
        $stmt->execute();
        $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function insertarProductoG($codigo, $nombre){
        $mysqli = conexion();

        $consultaSQL = "INSERT INTO producto_g($codigo, $nombre VALUES(?,?)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "sssidii", $codigo, $nombre
        );

        $stmt->execute();
        $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function ActualizarProductoG($codigo,$nombre){
        $mysqli = conexion();

        $consultaSQL = "UPDATE producto_g SET nombre = ? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssids",$nombre,$talla,$cantidad,$precio,$codigo
        );

        $stmt->execute();
        $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }
