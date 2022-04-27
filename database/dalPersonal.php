<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/personal.php');

    function listaDePersonal(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM personal';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new personal();
            $obj->id = $row['id'];
            $obj->codigo = $row['codigo'];
            $obj->nombre = $row['nombre'];
            $obj->apellidoPaterno = $row['apellidoPaterno'];
            $obj->apellidoMaterno = $row['apellidoMaterno'];
            $obj->dni = $row['dni'];
            $obj->contacto = $row['contacto'];
            $obj->direccion = $row['direccion'];
            $obj->cargo = $row['cargo'];
            $obj->estado = $row['estado'];
            $obj->correo = $row['correo'];
            $obj->foto = $row['foto'];
            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function obtenerDatosDeInicioSeccion($correo,$contrasena){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_IniciarSeccion(?,?)';
        $stmt = $mysqli->prepare($consultaSQL);
        $encriptar = md5($contrasena);
        $stmt ->bind_param('ss',$correo,$encriptar);
        $stmt->execute();

        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            $obj = new personal();
            $obj->id = $row['id'];
            $obj->codigo = $row['codigo'];
            $obj->nombre = $row['nombre'];
            $obj->apellidoPaterno = $row['apellidoPaterno'];
            $obj->apellidoMaterno = $row['apellidoMaterno'];
            $obj->dni = $row['dni'];
            $obj->contacto = $row['contacto'];
            $obj->direccion = $row['direccion'];
            $obj->cargo = $row['cargo'];
            $obj->estado = $row['estado'];
            $obj->correo = $row['correo'];
            $obj->foto = $row['foto'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();

        return $lista;
    }

    function borrarPersonal($id){
        $mysqli = conexion();
        $resultado = 0;
    
        $consultaSQL = "UPDATE personal SET estado = 0 WHERE id = ?";
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

    function insertarPersonal($codigo,$nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$contrasena,$foto){
        $mysqli = conexion();
        $resultado = 0;
    
        $consultaSQL = "INSERT INTO personal (codigo,nombre, apellidoPaterno, apellidoMaterno, dni, contacto,direccion,cargo,estado,sueldo,fechaContrato,correo,contrasena,foto) VALUES(?,?,?,?,?,?,?,?,1,?,now(),?,?,?)";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ssssiissdsss", $codigo,$nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo,$correo,$contrasena,$foto
        );
    
        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $resultado;
    }

    function ActualizarPersonal($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo, $correo,$foto){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "UPDATE personal SET nombre = ?, apellidoPaterno = ?, apellidoMaterno  = ?, dni = ?, contacto = ?,direccion = ?,cargo = ?,sueldo = ?,correo = ?,foto = ? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "sssiissdsss", $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$cargo,$sueldo,$correo,$foto,$codigo
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }

    function ObtenerPersonalPorID($id){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM personal WHERE id = ?';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            $obj = new personal();
            $obj->id = $row['id'];
            $obj->codigo = $row['codigo'];
            $obj->nombre = $row['nombre'];
            $obj->apellidoPaterno = $row['apellidoPaterno'];
            $obj->apellidoMaterno = $row['apellidoMaterno'];
            $obj->dni = $row['dni'];
            $obj->contacto = $row['contacto'];
            $obj->direccion = $row['direccion'];
            $obj->cargo = $row['cargo'];
            $obj->estado = $row['estado'];
            $obj->correo = $row['correo'];
            $obj->foto = $row['foto'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }

?>
