<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/ingresoCaja.php');

    function listaDeIngresoCaja(){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissy_ListaDeIngresoCaja();';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new ingresoCaja();
            $obj->id = $row['id'];
            $obj->monto = $row['monto'];
            $obj->fecha = $row['fecha'];
            $obj->estado = $row['estado'];
            $obj->tipo = $row['tipo'];
            $obj->codigo = $row['codigo'];
            $obj->nombreTipo = $row['nombreTipo'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }
    function listaDeIngresoCajaActivo(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM ingreso_caja WHERE estado=1';
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
        $lista = array();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $obj = new ingresoCaja();
            $obj->id = $row['id'];
            $obj->monto = $row['monto'];
            $obj->fecha = $row['fecha'];
            $obj->estado = $row['estado'];
            $obj->tipo = $row['tipo'];
            $obj->codigo = $row['codigo'];
            array_push($lista, $obj);
        }
        $stmt->close();
        $mysqli->close();
        return $lista;
    }

    function borrarIngresoCaja($id,$estado){
        $mysqli = conexion();
        $consultaSQL = "UPDATE ingreso_caja SET estado = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "ii",
            $estado,$id
        );
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

    function insertarIngresoCaja($monto,$tipo,$codigo){
        $mysqli = conexion();
        $consultaSQL = "INSERT INTO ingreso_caja(monto,tipo,fecha,estado,codigo) VALUES(?,?,now(),1,?)";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "dis", $monto,$tipo,$codigo
        );
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

    function ActualizarIngresoCaja($monto,$codigo){
        $mysqli = conexion();
        $consultaSQL = "UPDATE ingreso_caja SET monto = ? WHERE codigo = ?";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "ds",$monto,$codigo
        );
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

    function ObtenerIngresoCajaPorID($id){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM ingreso_caja WHERE id = ?';
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();
        $lista = array();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $obj = new ingresoCaja();
            $obj->id = $row['id'];
            $obj->monto = $row['monto'];
            $obj->fecha = $row['fecha'];
            $obj->estado = $row['estado'];
            $obj->tipo = $row['tipo'];
            $obj->codigo = $row['codigo'];
            array_push($lista, $obj);
        }
        $stmt->close();
        $mysqli->close();
        return $lista; 
    }


    function delectIngresoCaja($id){

        $mysqli = conexion();
        $consultaSQL = "DELETE FROM ingreso_caja WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $id
        );
        $stmt->execute();

        $stmt->close();
        $mysqli->close();    
    }

    function validarExistencia($codigo){
        $mysqli = conexion();
        $consultaSQL = "SELECT  if(COUNT(*)>0,true,false)  as estado FROM ingreso_caja WHERE codigo = ? ;";
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
?>