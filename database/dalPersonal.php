<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/personal.php');

    function listaDePersonal(){
        $mysqli = conexion();
        $consultaSQL = 'CALL emp_ListarPersonal();';
        
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
            $obj->idcargo = $row['idcargo'];
            $obj->estado = $row['estado'];
            $obj->correo = $row['correo'];
            $obj->foto = $row['foto'];
            $obj->nombreCargo =  $row['nombreCargo'];

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
            $obj->idcargo = $row['idcargo'];
            $obj->estado = $row['estado'];
            $obj->correo = $row['correo'];
            $obj->foto = $row['foto'];
            // $obj->nombreCargo =  $row['nombreCargo'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();

        return $lista;
    }

    function borrarPersonal($id,$estado){
        $mysqli = conexion();
    
        $consultaSQL = "UPDATE personal SET estado = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",$estado,$id
        );
        $stmt->execute();
        $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function insertarPersonal($codigo,$nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$idcargo,$sueldo, $correo,$contrasena,$foto){
        $mysqli = conexion();
    
        $consultaSQL = "INSERT INTO personal (codigo,nombre, apellidoPaterno, apellidoMaterno, dni, contacto,direccion,idcargo,estado,sueldo,fechaContrato,correo,contrasena,foto) VALUES(?,?,?,?,?,?,?,?,1,?,now(),?,?,?)";
        $stmt = $mysqli->prepare($consultaSQL);
        $encriptar = md5($contrasena);

        $stmt->bind_param(
            "ssssiisidsss", $codigo,$nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$idcargo,$sueldo,$correo,$encriptar,$foto
        );
    
        $stmt->execute();
        $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function ActualizarPersonal($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$idcargo,$sueldo, $correo,$foto){
        $mysqli = conexion();

        $consultaSQL = "UPDATE personal SET nombre = ?, apellidoPaterno = ?, apellidoMaterno  = ?, dni = ?, contacto = ?,direccion = ?,idcargo = ?,sueldo = ?,correo = ?,foto = ? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "sssiisidsss", $nombre, $apellidoPaterno, $apellidoMaterno, $dni, $contacto,$direccion,$idcargo,$sueldo,$correo,$foto,$codigo
        );

        $stmt->execute();
        $stmt->get_result();

        $stmt->close();
        $mysqli->close();
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
            $obj->idcargo = $row['idcargo'];
            $obj->estado = $row['estado'];
            $obj->correo = $row['correo'];
            $obj->foto = $row['foto'];
            // $obj->nombreCargo =  $row['nombreCargo'];

            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }
    function validarExistencia($dni){

        $mysqli = conexion();
        $consultaSQL = "SELECT * FROM personal WHERE dni = ? ;";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $dni
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
