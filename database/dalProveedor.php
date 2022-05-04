<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/proveedor.php');

    function listaDeProveedor(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM proveedor';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new proveedor();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->apellidoPaterno = $row['apellidoPaterno'];
            $obj->apellidoMaterno = $row['apellidoMaterno'];
            $obj->codigo = $row['codigo'];
            $obj->condicionsunat = $row['condicionSunat'];
            $obj->direccion = $row['direccion'];
            $obj->docIdentidad = $row['docIdentidad'];
            $obj->estado = $row['estado'];
            $obj->estadoSunat = $row['estadoSunat'];
            $obj->fechaRegistro = $row['fechaRegistro'];
            $obj->telefono = $row['telefono'];
            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function borrarProveedor($id){
        $mysqli = conexion();
        $resultado = 0;
    
        $consultaSQL = "UPDATE proveedor SET estado = 0 WHERE id = ?";
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

    function insertarProveedor($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "INSERT INTO proveedor ( codigo, nombre, apellidoPaterno, apellidoMaterno, docIdentidad, direccion, telefono, estadoSunat, condicionSunat,estado,fechaRegistro) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?,1,now());";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssssisiss", $codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }
    
    function actualizarProveedor($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "UPDATE proveedor SET apellidoMaterno = ?,apellidoPaterno = ?,condicionSunat = ?,direccion = ?,docIdentidad = ?,estadoSunat = ?,nombre = ?,telefono = ? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssssissss",
            $apellidoMaterno,$apellidoPaterno,$condicionSunat,$direccion,$docIdentidad,$estadoSunat,$nombre,$telefono,$codigo
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }

    function ObtenerProveedorPorID($id){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM proveedor WHERE id = ?';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new proveedor();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->apellidoPaterno = $row['apellidoPaterno'];
            $obj->apellidoMaterno = $row['apellidoMaterno'];
            $obj->codigo = $row['codigo'];
            $obj->condicionsunat = $row['condicionSunat'];
            $obj->direccion = $row['direccion'];
            $obj->docIdentidad = $row['docIdentidad'];
            $obj->estado = $row['estado'];
            $obj->estadoSunat = $row['estadoSunat'];
            $obj->fechaRegistro = $row['fechaRegistro'];
            $obj->telefono = $row['telefono'];
            array_push($lista, $obj);
        }
    

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }
    
    function ObtenerProveedorPorDocIdentidad($docIdentidad){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM proveedor WHERE docIdentidad = ?';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $docIdentidad
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new proveedor();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->apellidoPaterno = $row['apellidoPaterno'];
            $obj->apellidoMaterno = $row['apellidoMaterno'];
            $obj->codigo = $row['codigo'];
            $obj->condicionsunat = $row['condicionSunat'];
            $obj->direccion = $row['direccion'];
            $obj->docIdentidad = $row['docIdentidad'];
            $obj->estado = $row['estado'];
            $obj->estadoSunat = $row['estadoSunat'];
            $obj->fechaRegistro = $row['fechaRegistro'];
            $obj->telefono = $row['telefono'];
            array_push($lista, $obj);
        }
    

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }
    

?>
