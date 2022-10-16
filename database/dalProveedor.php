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




    function borrarProveedor($id,$estado){
        $mysqli = conexion();

        $consultaSQL = "UPDATE proveedor SET estado = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",$estado,$id
        );
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }


    function insertarProveedor($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        $mysqli = conexion();

        $consultaSQL = "INSERT INTO proveedor ( codigo, nombre, apellidoPaterno, apellidoMaterno, docIdentidad, direccion, telefono, estadoSunat, condicionSunat,estado,fechaRegistro) 
                        VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?,1,now());";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssssisiss", $codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat
        );

        $stmt->execute();
        // $stmt->get_result();
        
        $stmt->close();
        $mysqli->close();

    }
    
    function actualizarProveedor($codigo,$nombre,$apellidoPaterno,$apellidoMaterno,$docIdentidad,$direccion,$telefono,$estadoSunat,$condicionSunat){
        $mysqli = conexion();

        $consultaSQL = "UPDATE proveedor SET apellidoMaterno = ?,apellidoPaterno = ?,condicionSunat = ?,direccion = ?,docIdentidad = ?,estadoSunat = ?,nombre = ?,telefono = ? WHERE codigo = ?";
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
    
    function validarExistenciaP($docIdentidad){

        $mysqli = conexion();
        $consultaSQL = "SELECT  if(COUNT(*)>0,true,false)  as estado  FROM proveedor WHERE docIdentidad = ? ;";
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
    // function existenciaProveedorGProductoE($id){

    //     $mysqli = conexion();
    //     $consultaSQL = "SELECT if( (SELECT COUNT(*) FROM producto_e p where p.idproducto  =  ?) != 0, true, false) as estado;";
    //     $stmt = $mysqli->prepare($consultaSQL);
    //     $stmt->bind_param(
    //         "i",
    //         $id
    //     );
    //     $stmt->execute();

    //     $result = $stmt->get_result();
    
    //       $estado = "";

    //     if($row = $result->fetch_assoc()){
    //         $estado = $row['estado'];

    //     }

    //     $stmt->close();
    //     $mysqli->close();

    // return $estado;
      
    // }

    function delectProveedor($id){

        $mysqli = conexion();
        $consultaSQL = "DELETE FROM proveedor WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();

        $stmt->close();
        $mysqli->close();    
    }

?>
