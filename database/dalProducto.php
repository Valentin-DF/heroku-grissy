<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/producto.php');

 function listaDeProductos()
 {
     $mysqli = conexion();
     $consultaSQL = 'SELECT * FROM productos';
     
     $stmt = $mysqli->prepare($consultaSQL);
     $stmt->execute();
 
     $lista = array();
     $result = $stmt->get_result();
 
     while ($row = $result->fetch_assoc()) {
 
         $obj = new producto();
         $obj->id = $row['id'];
         $obj->nombre = $row['nombre'];
         $obj->cantidad = $row['cantidad'];
         $obj->precio = $row['precio'];
         $obj->codigo = $row['codigo'];
         $obj->talla = $row['talla'];
         $obj->estado = $row['estado'];
         array_push($lista, $obj);
     }
 
     $stmt->close();
     $mysqli->close();
 
     return $lista;
 }

 function borrarProducto($id)
 {
     $mysqli = conexion();
     $resultado = 0;
 
     $consultaSQL = "UPDATE productos SET estado = 0 WHERE id = ?";
     $stmt = $mysqli->prepare($consultaSQL);
 
     $stmt->bind_param(
         "i",
         $id
     );
 
     if ($stmt->execute()) {
         $stmt->bind_result($resultado);
         $stmt->fetch();
     }
 
     $stmt->close();
     $mysqli->close();
 
     return $resultado;
 }

function insertarProducto($codigo,$nombre,$talla,$cantidad,$estado,$precio)
{
    $mysqli = conexion();
    $resultado = 0;

    $consultaSQL = "INSERT INTO productos(codigo, nombre, talla, cantidad, precio, estado) VALUES(?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($consultaSQL);

    $stmt->bind_param(
        "sssidi", $codigo,$nombre,$talla,$cantidad,$precio,$estado
    );

    if ($stmt->execute()) {
        $stmt->bind_result($resultado);
        $stmt->fetch();
    }

    $stmt->close();
    $mysqli->close();

    return $resultado;
}

?>
