<?php
require_once('/xampp/htdocs/Grissy/database/dalTipoCambio.php');

    function obtenerListaDeTipoCambio(){
        return listaDeTipoCambio();
    }

    
    function guardarTipoCamnio($compra, $venta, $fecha){

        $id = obtenerTipoCambio($fecha);

        //si es true = son iguales
        //si es false = son diferente
        if($id == 0){
            return insertarTipoCambio(floatval($compra),floatval( $venta), $fecha);

        }else{
            $estado = verificarEditableTipoCambio(floatval($compra),floatval($venta),$id);

            if($estado == false){
                return ActualizarTipoCambio(floatval($compra), floatval($venta), $id);

            }
        }

    }


?>