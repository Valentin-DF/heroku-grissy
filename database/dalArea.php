<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/area.php');

    function listaDeArea(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM area';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new area();
            $obj->id = $row['id'];
            $obj->codigo = $row['codigo'];
            $obj->nombre = $row['nombre'];
            $obj->estado = $row['estado'];
            $obj->foto = $row['foto'];
            $obj->descripcion = $row['descripcion'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function borrarArea($id,$estado){
        $mysqli = conexion();
        $resultado = 0;
    
        $consultaSQL = "UPDATE area SET estado = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ii",
            $estado,$id
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $resultado;
    }

    function insertarArea($codigo,$nombre,$descripcion,$foto){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "INSERT INTO area(codigo,nombre,descripcion,foto,estado) VALUES(?,?,?,?,1)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssss", $codigo,$nombre,$descripcion,$foto
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }

    function ActualizarArea($codigo,$nombre,$descripcion,$foto){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "UPDATE area SET nombre = ?,descripcion = ?, foto =? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssss",$nombre,$descripcion,$foto,$codigo
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }

    function ObtenerAreaPorID($id){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM area WHERE id = ?';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new area();
            $obj->id = $row['id'];
            $obj->codigo = $row['codigo'];
            $obj->nombre = $row['nombre'];
            $obj->estado = $row['estado'];
            $obj->foto = $row['foto'];
            $obj->descripcion = $row['descripcion'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }

?>