<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/moneda.php');

    function listaMoneda(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM moneda_empresa';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new moneda();
            $obj->id = $row['id'];
            $obj->codigo = $row['codigo'];
            $obj->nombre = $row['nombre'];
            $obj->estado = $row['estado'];
            $obj->tipo = $row['tipo'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

?>