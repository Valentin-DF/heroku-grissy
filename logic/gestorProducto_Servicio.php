<?php
require_once('/xampp/htdocs/Grissy/database/dalProducto_Servicio.php');

    function obtenerListaDeProductos_Servicio(){
        return listaDeProductos_Servicio();
    }

    function eliminarProducto_Servicio($id, $estado){
        return borrarProducto_Servicio($id, $estado);
    }

    function guardarProducto_Servicio($codigo, $nombre, $estado, $idArea, $idProducto, $idTipo){
        return insertarProducto_Servicio($codigo, $nombre, $estado, $idArea, $idProducto, $idTipo);
    }

    function editarProducto_Servicio($codigo,$nombre){
        return ActualizarProducto_Servicio($codigo,$nombre);
    }

    function buscarProductoPorId_Servicio($id){
        return ObtenerProductoPorID_Servicio($id);
    }

    function buscarProductoPorNombre_Servicio($nombrePro){
        return ObtenerProductoPorNombre_Servicio($nombrePro);
    }
    
    function buscarProductoPorNombre2_Servicio($nombrePro){
        return ObtenerProductoPorNombre2_Servicio($nombrePro);
    }

    function exixtenciaProducto_Servicio($codigo){
        return validarExistencia_Servicio($codigo);
    }

    function delecteProduct_Servicio($id){
        return delectProducto_Servicio($id);
    }

?>