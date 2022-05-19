<?php
require_once('/xampp/htdocs/Grissy/database/dalGraficos.php');

    function GraficoSemanalDelPersonal($id){
        return GraficoSemanalIdPersonal($id);
    }
    
    function GraficoMensualDelPersonal($id){
        return GraficoMensualIdPersonal($id);
    }

?>