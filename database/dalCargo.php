<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/cargo.php');

    function listaDeCargo(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT codigo,id,nombre,principal,(if(principal = 1,"Activo","Desactivado")) AS nombrePrincipal,secundario,(if(secundario = 1,"Activo","Desactivado")) AS nombreSecundario,estado FROM cargo;';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new cargo();
            $obj->id = $row['id'];
            $obj->codigo = $row['codigo'];
            $obj->nombre = $row['nombre'];
            $obj->principal = $row['principal'];
            $obj->nombrePrincipal = $row['nombrePrincipal'];
            $obj->secundario = $row['secundario'];
            $obj->nombreSecundario = $row['nombreSecundario'];
            $obj->estado = $row['estado'];

            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    

    function borrarCargo($id,$estado){
        $mysqli = conexion();
    
        $consultaSQL = "UPDATE cargo SET estado = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",$estado,$id
        );
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function insertarCargo($codigo,$nombre,$principal,$secundario){
        $mysqli = conexion();
    
        $consultaSQL = "INSERT INTO cargo (codigo,nombre,principal,secundario,estado) VALUES(?,?,?,?,1)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssii", $codigo,$nombre,$principal,$secundario
        );
    
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function ActualizarCargo($codigo,$nombre,$principal,$secundario){
        $mysqli = conexion();

        $consultaSQL = "UPDATE cargo SET nombre = ?, principal = ? ,secundario = ? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "siis", $nombre,$principal,$secundario,$codigo
        );

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }


    function ObtenerCargoPorID($id){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM cargo WHERE id = ?';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            $obj = new cargo();
            $obj->id = $row['id'];
            $obj->codigo = $row['codigo'];
            $obj->nombre = $row['nombre'];
            $obj->principal = $row['principal'];
            $obj->secundario = $row['secundario'];
            $obj->estado = $row['estado'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }


    function existenciaCargoenPersonal($id){

        $mysqli = conexion();
        $consultaSQL = "SELECT if( (SELECT COUNT(*) FROM personal p where p.idcargo  =  ?) != 0, true, false) as estado;";
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

    function delectCargo($id){

        $mysqli = conexion();
        $consultaSQL = "DELETE FROM cargo WHERE id = ?";
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
        $consultaSQL = "SELECT if(COUNT(*)>0,true,false)  as estado FROM cargo WHERE codigo = ? ;";
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
