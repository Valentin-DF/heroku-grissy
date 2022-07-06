<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/reporte.php');

    function reporteEntradaSalida($fechaInicio, $fechaFinal, $idEncargado, $idArea, $idProducto){
        $mysqli = conexion();
        $consultaSQL = ' CALL grissy_ReporteDeEntradaySalida(?,?,?,?,?);';
        
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssiii",
            $fechaInicio,$fechaFinal,$idProducto,$idArea,$idEncargado
        );

        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new r_EntradaySalida();
            $obj->id = $row['id'];
            $obj->fecha = $row['fecha'];
            $obj->codigoEncargado = $row['codigoEncargado'];
            $obj->nombreEncargado = $row['nombreEncargado'];
            $obj->codigoArea = $row['codigoArea'];
            $obj->nombreArea = $row['nombreArea'];
            $obj->codigoProducto = $row['codigoProducto'];
            $obj->estadoProducto = $row['estadoProducto'];
            $obj->nombreProducto = $row['nombreProducto'];
            $obj->monto = $row['monto'];
            $obj->condicion = $row['condicion'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }
    function listarEntradaSalisa(){
        $mysqli = conexion();
        $consultaSQL = ' CALL grissy_ListraEntradaSalida';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new r_EntradaySalida();
            $obj->id = $row['id'];
            $obj->fecha = $row['fecha'];
            $obj->codigoEncargado = $row['codigoEncargado'];
            $obj->nombreEncargado = $row['nombreEncargado'];
            $obj->codigoArea = $row['codigoArea'];
            $obj->nombreArea = $row['nombreArea'];
            $obj->codigoProducto = $row['codigoProducto'];
            $obj->estadoProducto = $row['estadoProducto'];
            $obj->nombreProducto = $row['nombreProducto'];
            $obj->monto = $row['monto'];
            $obj->condicion = $row['condicion'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function reporteVenta($fechaInicio,$fechaFinal,$idEncargado){
        $mysqli = conexion();
        $consultaSQL = ' CALL grissy_ReporteVenta (?,?,?)';
        
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "ssi",
            $fechaInicio,$fechaFinal,$idEncargado
        );

        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new r_Ventas();
            $obj->id = $row['id'];
            $obj->codigoVenta = $row['codigoVenta'];
            $obj->fecha = $row['fecha'];
            $obj->codigoEncargado = $row['codigoEncargado'];
            $obj->nombreEncargado = $row['nombreEncargado'];
            $obj->dni = $row['dni'];
            $obj->cliente = $row['cliente'];
            $obj->descripcion = $row['descripcion'];
            $obj->monto = $row['monto'];
            $obj->estado = $row['estado'];

            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }
    function listarVenta(){
        $mysqli = conexion();
        $consultaSQL = ' CALL grissy_ListaVenta';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new r_Ventas();
            $obj->id = $row['id'];
            $obj->codigoVenta = $row['codigoVenta'];
            $obj->fecha = $row['fecha'];
            $obj->codigoEncargado = $row['codigoEncargado'];
            $obj->nombreEncargado = $row['nombreEncargado'];
            $obj->dni = $row['dni'];
            $obj->cliente = $row['cliente'];
            $obj->descripcion = $row['descripcion'];
            $obj->monto = $row['monto'];
            $obj->estado = $row['estado'];

            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }
   
    function registrarEntradaSalida($idEncargado,$idArea,$idProducto,$monto,$condicion){
        $mysqli = conexion();

        $consultaSQL = "INSERT INTO entradas_salidas(idEncargado,idArea,idProducto,monto,fecha,condicion) VALUES(?,?,?,?,now(),?)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "iiiii",$idEncargado,$idArea,$idProducto,$monto,$condicion
        );

        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

?>