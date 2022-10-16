<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/producto.php');

    function listaDeProductos_Servicio(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM producto_e where idtipo =2';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new producto();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->cantidad = $row['cantidad'];
            $obj->precio = $row['precio'];
            $obj->codigo = $row['codigo'];
            $obj->talla = $row['talla'];
            $obj->estado = $row['estado'];
            $obj->idarea = $row['idarea'];
            $obj->idproducto = $row['idproducto'];
            $obj->idtipo = $row['idtipo'];
            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }


    function borrarProducto_Servicio($id, $estado){
        $mysqli = conexion();
    
        $consultaSQL = "UPDATE producto_e SET estado = ? WHERE id = ? ";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",$estado,$id
        );
    
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function insertarProducto_Servicio($codigo, $nombre, $estado, $idArea, $idProducto,$idTipo){
        $mysqli = conexion();

        $consultaSQL = "CALL guardar_ProductoEmpresa_Servicio (?,?,?,?,?,1)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssiii", $codigo, $nombre, $idArea, $idProducto,$idTipo
        );

        $stmt->execute();

        $result = $stmt->get_result();

        $id = 0; 

        if($row = $result->fetch_assoc()){
            $id = $row['id'];
        }

        $stmt->close();
        $mysqli->close();

        return  $id;
    }

    function ActualizarProducto_Servicio($codigo,$nombre,){
        $mysqli = conexion();

        $consultaSQL = "UPDATE producto_e SET nombre = ? WHERE codigo = ? and idtipo = 2";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ss",$nombre,$codigo
        );

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function ObtenerProductoPorID_Servicio($id){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM producto_e WHERE id = ? and idtipo = 2';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
    
            $obj = new producto();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->cantidad = $row['cantidad'];
            $obj->precio = $row['precio'];
            $obj->codigo = $row['codigo'];
            $obj->talla = $row['talla'];
            $obj->estado = $row['estado'];
            $obj->idarea = $row['idarea'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }
    function ObtenerProductoPorNombre_Servicio($nombrePro){
        $mysqli = conexion();
        $consultaSQL = " CALL grissy_ListarProductoPorNombre_Servicio( ? ); ";
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "s",
            $nombrePro
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
    
            $obj = new producto();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->cantidad = $row['cantidad'];
            $obj->precio = $row['precio'];
            $obj->codigo = $row['codigo'];
            $obj->talla = $row['talla'];
            $obj->estado = $row['estado'];
            $obj->idarea = $row['idarea'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }
    function ObtenerProductoPorNombre2_Servicio($nombrePro){
        $mysqli = conexion();
        $consultaSQL = " CALL grissy_ListarProductoSinLimitePorNombre_Servicio( ? ); ";
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "s",
            $nombrePro
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
    
            $obj = new producto();
            $obj->id = $row['id'];
            $obj->nombre = $row['nombre'];
            $obj->cantidad = $row['cantidad'];
            $obj->precio = $row['precio'];
            $obj->codigo = $row['codigo'];
            $obj->talla = $row['talla'];
            $obj->estado = $row['estado'];
            $obj->idarea = $row['idarea'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }

    function validarExistencia_Servicio($codigo){

        $mysqli = conexion();
        $consultaSQL = "SELECT  if(COUNT(*)>0,true,false)  as estado  FROM producto_e WHERE codigo = ? ;";
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



    function delectProducto_Servicio($id){

        $mysqli = conexion();
        $consultaSQL = "DELETE FROM producto_e WHERE id = ?";
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