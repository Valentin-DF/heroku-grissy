<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/personal.php');

 function listaDePersonal()
 {
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

 function obtenerDatosDeInicioSeccion($correo,$contrasena)
 {
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

?>
