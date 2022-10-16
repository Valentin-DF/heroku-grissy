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
        // $stmt->get_result();

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
        // $stmt->get_result();

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
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }


    function ObtenerPersonalPorID($id){
        $mysqli = conexion();
        $consultaSQL = 'CALL emp_ListarPersonalID( ? )';
        
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
            $obj->nombreCargo =  $row['nombreCargo'];

            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }

    function ObtenerPersonalPorDocumento($documento){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * from personal where dni = ?';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $documento
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            $obj = new personal();
            $obj->id = $row['id'];
            $obj->dni = $row['dni'];
            $obj->nombre = $row['nombre'];
            $obj->apellidoPaterno = $row['apellidoPaterno'];
            $obj->apellidoMaterno = $row['apellidoMaterno'];
            $obj->sueldo = $row['sueldo'];
            $obj->codigo = $row['codigo'];

            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }

    function validarExistencia($dni){

        $mysqli = conexion();
        $consultaSQL = "SELECT if(COUNT(*)>0,true,false)  as estado  FROM personal WHERE dni = ? ;";
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

    function ActualizarPerfil($codigo, $nombre, $apellidoPaterno, $apellidoMaterno, $contacto, $direccion,  $correo, $foto, $contrasena){
        $mysqli = conexion();

        $consultaSQL = "UPDATE personal SET nombre = ?, apellidoPaterno = ?, apellidoMaterno  = ?,  contacto = ?,direccion = ?,correo = ?,foto = ?,contrasena = ? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);
        $encriptar = md5($contrasena);
        $stmt->bind_param(
            "sssisssss", $nombre, $apellidoPaterno, $apellidoMaterno, $contacto, $direccion,  $correo, $foto, $encriptar,$codigo
        );

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function existenciaPersonalVenta($id){

        $mysqli = conexion();
        $consultaSQL = "SELECT if( (SELECT COUNT(*) FROM venta v where v.idPersonal  =  ?) != 0, true, false) as estado;";
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

    function delectPersonal($id){

        $mysqli = conexion();
        $consultaSQL = "DELETE FROM personal WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();

        $stmt->close();
        $mysqli->close();    
    }


    function obtenerSinPagarEnElMes(){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_PersonalSinPagarEnElMes()';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            $obj = new personal();
            $obj->dni = $row['documento'];
            $obj->nombre = $row['nombre'];
            $obj->fechaContrato = $row['fecha'];


            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }




    function insertarSalrioDelMes($idpersonal,  $salariobase,$bonificacionextra,$descuentos,$totalsueldo){
        $mysqli = conexion();
    
        $consultaSQL = "INSERT INTO salario_personal (idPersonal,salario_Base, bonificacion_extra, descuentos, total_sueldo, fecha)
         VALUES(?,?,?,?,?,now())";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "idddd", $idpersonal,  $salariobase,$bonificacionextra,$descuentos,$totalsueldo
        );
    
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }


?>
