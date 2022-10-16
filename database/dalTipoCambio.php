<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/tipoCambio.php');

    function listaDeTipoCambio(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM tipo_cambio tc where MONTH (tc.fecha) = MONTH (NOW()) ';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new tipoCambio();
            $obj->id = $row['id'];
            $obj->fecha = $row['fecha'];
            $obj->venta = $row['venta'];
            $obj->compra = $row['compra'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function insertarTipoCambio($compra, $venta, $fecha){
        $mysqli = conexion();

        $consultaSQL = "INSERT INTO tipo_cambio(compra,venta,fecha) VALUES(?,?,?)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "dds", $compra, $venta, $fecha
        );


        $stmt->execute();


        $stmt->close();
        $mysqli->close();
    }

    function ActualizarTipoCambio($compra, $venta, $id){
        $mysqli = conexion();

        $consultaSQL = "UPDATE tipo_cambio SET compra = ?,venta = ? WHERE id = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ddi",$compra, $venta, $id
        );

        $stmt->execute();

        $stmt->close();
        $mysqli->close();
    }


    function obtenerTipoCambio( $fecha){

        $mysqli = conexion();
        $consultaSQL = "SELECT tc.id from tipo_cambio tc WHERE tc.fecha = ?";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "s",
            $fecha
        );
        $stmt->execute();

        $result = $stmt->get_result();
    
          $id = 0;

        if($row = $result->fetch_assoc()){
            $id = $row['id'];

        }

        $stmt->close();
        $mysqli->close();

    return $id;
      
    }
    function verificarEditableTipoCambio($compra,$venta,$id){

        $mysqli = conexion();
        $consultaSQL = "CALL grissy_TipoCambio(?,?,?)";
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "idd",
            $id,$venta,$compra
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