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
    
            $obj = new producto();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->apellidoPaterno = $row['apellidoPaterno'];
            $obj->apellidoMaterno = $row['apellidoMaterno'];
            $obj->codigo = $row['codigo'];
            $obj->condicionsunat = $row['condicionSunat'];
            $obj->direccion = $row['direccion'];
            $obj->docIdentidad = $row['docIdentidad'];
            $obj->estado = $row['estado'];
            $obj->estadoSunat = $row['estadosunat'];
            $obj->fechaRegistro = $row['fecharRegistro'];
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

    function insertarCliente($apellidoMaterno,$apellidoPaterno,$codigo,$condicionSunat,$direccion,$docIdentidad,$estadosunat,$nombre,$telefono){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "INSERT INTO cliente(apellidoMaterno,apellidoPaterno,codigo,condicionSunat,direccion,docIdentidad,estado,estadosunat,fechaRegistro,nombre,telefono) VALUES(?,?,?,?,?,?,1,?,now(),?,?)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "sssssissi", $apellidoMaterno,$apellidoPaterno,$codigo,$condicionSunat,$direccion,$docIdentidad,$estadosunat,$nombre,$telefono
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }
    
    function actualizarCliente($apellidoMaterno,$apellidoPaterno,$id,$condicionSunat,$direccion,$docIdentidad,$estadosunat,$nombre,$telefono){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "UPDATE cliente SET apellidoMaterno = ?,apellidoPaterno = ?,condicionSunat = ?,direccion = ?,docIdentidad = ?,estadosunat = ?,nombre = ?,telefono = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssssisssi",
            $apellidoMaterno,$apellidoPaterno,$condicionSunat,$direccion,$docIdentidad,$estadosunat,$nombre,$telefono,$id
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
