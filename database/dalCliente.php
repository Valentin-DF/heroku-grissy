<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/cliente.php');

    function listaDeClientes(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM cliente';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new cliente();
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

    function borrarCliente($id){
        $mysqli = conexion();
        $resultado = 0;
    
        $consultaSQL = "UPDATE cliente SET estado = 0 WHERE id = ?";
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

    function insertarCliente($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "INSERT INTO cliente (id, codigo, nombre, apellidoPaterno, apellidoMaterno, docIdentidad, direccion, telefono, estadoSunat, condicionSunat,estado,fechaRegistro) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?,1,now());";
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
    
    function actualizarCliente($apellidoMaterno,$apellidoPaterno,$id,$condicionSunat,$direccion,$docIdentidad,$estadoSunat,$nombre,$telefono){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "UPDATE cliente SET apellidoMaterno = ?,apellidoPaterno = ?,condicionSunat = ?,direccion = ?,docIdentidad = ?,estadoSunat = ?,nombre = ?,telefono = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssssisssi",
            $apellidoMaterno,$apellidoPaterno,$condicionSunat,$direccion,$docIdentidad,$estadoSunat,$nombre,$telefono,$id
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
