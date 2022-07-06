<?php

    class r_EntradaySalida {
        public $id;
        public $fecha;
        public $codigoEncargado;
        public $nombreEncargado;
        public $codigoArea;
        public $nombreArea;
        public $codigoProducto;
        public $estadoProducto;
        public $nombreProducto;
        public $monto;
        public $condicion;
    }

    class r_Ventas {
        public $id;
        public $codigoVenta;
        public $fecha;
        public $codigoEncargado;
        public $nombreEncargado;
        public $dni;
        public $cliente;
        public $descripcion;
        public $monto;
        public $estado;
    }

?>
