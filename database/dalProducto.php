<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/producto.php');

    function listaDeProductos(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM producto_e where idtipo =1';
        
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
            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function listaDeTipoProductos(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM tipo_producto';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new tipo_producto();
            $obj->id = $row['id'];
            $obj->tipo = $row['tipo'];
            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function borrarProducto($id, $estado){
        $mysqli = conexion();
    
        $consultaSQL = "UPDATE producto_e SET estado = ? WHERE id = ? and idtipo =1";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",$estado,$id
        );
    
        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function insertarProducto($codigo, $nombre, $talla, $cantidad, $estado, $precio, $idArea, $idProducto,$idTipo){
        $mysqli = conexion();

        $consultaSQL = "CALL guardar_ProductoEmpresa (?,?,?,?,1,?,?,?,?)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "sssidiii", $codigo, $nombre, $talla, $cantidad,$precio, $idArea, $idProducto,$idTipo
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

    function ActualizarProducto($codigo,$nombre,$talla,$cantidad,$precio){
        $mysqli = conexion();

        $consultaSQL = "UPDATE producto_e SET nombre = ?,talla = ?,cantidad = ?,precio = ? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssids",$nombre,$talla,$cantidad,$precio,$codigo
        );

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function ObtenerProductoPorID($id){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM producto_e WHERE id = ? and idtipo =1';
        
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
    function ObtenerProductoPorNombre($nombrePro){
        $mysqli = conexion();
        $consultaSQL = " CALL grissy_ListarProductoPorNombre( ? ); ";
        
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

    function ObtenerProductoPorNombreTipo($nombrePro,$idTipo){
        $mysqli = conexion();
        $consultaSQL = " CALL grissy_ListarProductoPorNombreTipo( ? ,?); ";
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "si",
            $nombrePro,$idTipo
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

    function ObtenerProductoPorNombre2($nombrePro){
        $mysqli = conexion();
        $consultaSQL = " CALL grissy_ListarProductoSinLimitePorNombre( ? ); ";
        
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
    function ActualizarStockProducto($id,$cantidad){
        $mysqli = conexion();
    
        $consultaSQL = "UPDATE producto_e SET cantidad = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
    
        $stmt->bind_param(
            "ii",
            $cantidad,$id
        );
        $stmt->execute();
        // $stmt->get_result();
    
        $stmt->close();
        $mysqli->close();

    }

    function validarExistencia($codigo){

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

    
    function existenciaProductoDetalleVenta($id){

        $mysqli = conexion();
        $consultaSQL = "SELECT if( (SELECT COUNT(*) FROM detalleventa v where v.idproducto =  ?) != 0, true, false) as estado;";
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

    function delectProducto($id){

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