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
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function borrarArea($id){
        $mysqli = conexion();
        $resultado = 0;
    
        $consultaSQL = "UPDATE area SET estado = 0 WHERE id = ?";
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

    function insertarArea($codigo,$nombre){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "INSERT INTO area(codigo,nombre,estado) VALUES(?,?,1)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ss", $codigo,$nombre
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }

    function ActualizarArea($id,$nombre){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "UPDATE area SET nombre = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "si",$nombre,$id
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