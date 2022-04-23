<?php

    function conexion(){
        $mysqli = new mysqli("localhost", "root", "", "grissy");

        if($mysqli->connect_error){
            die('Se produjo un error de conexión: (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }

        $mysqli->set_charset('utf8');
        return $mysqli;
    }
?>