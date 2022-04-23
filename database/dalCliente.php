<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/cliente.php');

 function listaDeClientes()
 {
     $mysqli = conexion();
     $consultaSQL = 'SELECT * FROM cliente';
     
     $stmt = $mysqli->prepare($consultaSQL);
     $stmt->execute();
 
     $lista = array();
     $result = $stmt->get_result();
 
     while ($row = $result->fetch_assoc()) {
 
         $obj = new cliente();
        //  $obj->id = $row['id'];
        //  $obj->nombre = $row['nombre'];
         array_push($lista, $obj);
     }
 
     $stmt->close();
     $mysqli->close();
 
     return $lista;
 }

?>