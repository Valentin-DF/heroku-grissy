<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/grafico.php');

    function GraficoSemanalIdPersonal($idpersonal){
        $mysqli = conexion();
        $consultaSQL = 'CALL GraficaVentaSemana_Perfil( ? )';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $idpersonal
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new grafico();
            $obj->label = $row['label'];
            $obj->y = $row['y'];
         
            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function GraficoMensualIdPersonal($idpersonal){
        $mysqli = conexion();
        $consultaSQL = 'CALL GraficaVentaMes_Perfil( ? )';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "i",
            $idpersonal
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new grafico();
            $obj->label = $row['label'];
            $obj->y = $row['y'];
         
            array_push($lista, $obj);
        }
    
        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

  

?>
