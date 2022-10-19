<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/ingresoegreso.php');

 function obtenerIngresos($fechafin,$fechainicio,$fechames_ano){
    $mysqli = conexion();
    $consultaSQL = 'CALL 	grissyContable_ListaDeIngresos( ?,?,? )';
    
    $stmt = $mysqli->prepare($consultaSQL);
    $stmt->bind_param(
        "sss",
        $fechafin,$fechainicio,$fechames_ano
    );
    $stmt->execute();

    $lista = array();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {

        $obj = new ingresoegreso();
        $obj->nombre = $row['nombre'];
        $obj->total = $row['total'];
        array_push($lista, $obj);
    }

    $stmt->close();
    $mysqli->close();

    return $lista; 
}

    function obtenerGastos($fechafin,$fechainicio,$fechames_ano){
        $mysqli = conexion();
        $consultaSQL = 'CALL grissyContable_ListaDeGastos( ?,?,? )';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "sss",
            $fechafin,$fechainicio,$fechames_ano
        );
        $stmt->execute();

        $lista = array();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            $obj = new ingresoegreso();
            $obj->nombre = $row['nombre'];
            $obj->total = $row['total'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();

        return $lista; 
    }

 ?>