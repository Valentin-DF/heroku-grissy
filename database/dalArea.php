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
    function listaDeAreaActivo(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM area WHERE estado=1';
        
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
    
        $consultaSQL = "UPDATE area SET estado = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ii",
            $estado,$id
        );

        $stmt->execute();


        $stmt->close();
        $mysqli->close();
    }

    function insertarArea($codigo,$nombre,$descripcion,$foto){
        $mysqli = conexion();

        $consultaSQL = "INSERT INTO area(codigo,nombre,descripcion,foto,estado) VALUES(?,?,?,?,1)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssss", $codigo,$nombre,$descripcion,$foto
        );


        $stmt->execute();


        $stmt->close();
        $mysqli->close();
    }

    function ActualizarArea($codigo,$nombre,$descripcion,$foto){
        $mysqli = conexion();

        $consultaSQL = "UPDATE area SET nombre = ?,descripcion = ?, foto =? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssss",$nombre,$descripcion,$foto,$codigo
        );

        $stmt->execute();

        $stmt->close();
        $mysqli->close();
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

    function existenciaAreaenProducto($id){

        $mysqli = conexion();
        $consultaSQL = "SELECT if( (SELECT COUNT(*) FROM producto_e pe where pe.idarea  =  ?) != 0, true, false) as estado;";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();

        $result = $stmt->get_result();
    
          $estado = "";

        if($row = $result->fetch_assoc()){
            $estado = $row['estado'];

        }

        $stmt->close();
        $mysqli->close();

    return $estado;
      
    }

    function delectArea($id){

        $mysqli = conexion();
        $consultaSQL = "DELETE FROM area WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();

        $stmt->close();
        $mysqli->close();    
    }

    function validarExistencia($codigo){

        $mysqli = conexion();
        $consultaSQL = "SELECT  if(COUNT(*)>0,true,false)  as estado FROM area WHERE codigo = ? ;";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "s",
            $codigo
        );
        $stmt->execute();

        $result = $stmt->get_result();
    
          $estado = "";

        if($row = $result->fetch_assoc()){
            $estado = $row['estado'];

        }

        $stmt->close();
        $mysqli->close();

    return $estado;
      
    }
?>