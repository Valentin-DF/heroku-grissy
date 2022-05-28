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

    function borrarCliente($id,$estado){
        $mysqli = conexion();

        $consultaSQL = "UPDATE cliente SET estado = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",$estado,$id
        );
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function insertarCliente($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        $mysqli = conexion();
       
        $consultaSQL = "INSERT INTO cliente ( codigo, nombre, apellidoPaterno, apellidoMaterno, docIdentidad, direccion, telefono, estadoSunat, condicionSunat,estado,fechaRegistro) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?,1,now());";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssssisiss", $codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat
        );
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function validarExistencia($docIdentidad){

        $mysqli = conexion();
        $consultaSQL = "SELECT * FROM cliente WHERE docIdentidad = ? ;";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $docIdentidad
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

    
    function actualizarCliente($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        $mysqli = conexion();

        $consultaSQL = "UPDATE cliente SET apellidoMaterno = ?,apellidoPaterno = ?,condicionSunat = ?,direccion = ?,docIdentidad = ?,estadoSunat = ?,nombre = ?,telefono = ? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssssissss",
            $apellidoMaterno,$apellidoPaterno,$condicionSunat,$direccion,$docIdentidad,$estadoSunat,$nombre,$telefono,$codigo
        );

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();


    }

    function ObtenerClientePorID($id){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM cliente WHERE id = ?';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
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
    
    function ObtenerClientePorDocIdentidad($docIdentidad){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM cliente WHERE docIdentidad = ?';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $docIdentidad
        );
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
    function ObtenerClientePorDocIdentidad2($docIdentidad){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_ListarClientePorDocumento( ? );';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "s",
            $docIdentidad
        );
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

?>