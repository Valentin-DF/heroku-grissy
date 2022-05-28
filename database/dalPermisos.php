<?php
 require_once('/xampp/htdocs/Grissy/database/conexion.php');
 require_once('/xampp/htdocs/Grissy/models/permisos.php');

    function listaDePermisos(){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM permisos  ';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new permisos();
            $obj->id = $row['id'];
            $obj->idpersonal = $row['idpersonal'];
            $obj->p_grissyVenta = $row['p_grissyVenta'];
            $obj->p_grissyArea = $row['p_grissyArea'];
            $obj->p_grissyCliente = $row['p_grissyCliente'];
            $obj->p_grissyConfiguraciones = $row['p_grissyConfiguraciones'];
            $obj->p_grissyProductoEmp = $row['p_grissyProductoEmp'];
            $obj->p_grissyPersonal = $row['p_grissyPersonal'];
            $obj->p_grissyProveedor = $row['p_grissyProveedor'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista;
    }

    function insertarPermisos($idpersonal,$p_grissyVenta,$p_grissyArea,$p_grissyCliente,$p_grissyConfiguraciones,$p_grissyProductoEmp,$p_grissyPersonal,$p_grissyProveedor){
        $mysqli = conexion();
        $resultado = 0;

        $consultaSQL = "INSERT INTO permisos(idpersonal,p_grissyVenta,p_grissyArea,p_grissyCliente,p_grissyConfiguraciones,p_grissyProductoEmp,p_grissyPersonal,p_grissyProveedor) VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "siiiiiii", $idpersonal,$p_grissyVenta,$p_grissyArea,$p_grissyCliente,$p_grissyConfiguraciones,$p_grissyProductoEmp,$p_grissyPersonal,$p_grissyProveedor
        );

        if ($stmt->execute()) {
            $stmt->bind_result($resultado);
            $stmt->fetch();
        }

        $stmt->close();
        $mysqli->close();

        return $resultado;
    }

    function ActualizarPermisos($idpersonal,$p_grissyVenta,$p_grissyArea,$p_grissyCliente,$p_grissyConfiguraciones,$p_grissyProductoEmp,$p_grissyPersonal,$p_grissyProveedor){
        $mysqli = conexion();

        $consultaSQL = "UPDATE permisos SET p_grissyVenta = ?,p_grissyArea = ?,p_grissyCliente = ?,p_grissyConfiguraciones = ?,p_grissyProductoEmp = ?,p_grissyPersonal = ?,p_grissyProveedor = ? WHERE idpersonal = ?";
        $stmt = $mysqli->prepare($consultaSQL);

        $stmt->bind_param(
            "iiiiiiis",$p_grissyVenta,$p_grissyArea,$p_grissyCliente,$p_grissyConfiguraciones,$p_grissyProductoEmp,$p_grissyPersonal,$p_grissyProveedor,$idpersonal
        );

        $stmt->execute();
        // $stmt->get_result();

        $stmt->close();
        $mysqli->close();
    }

    function ObtenerPermisosPorPersonal($idpersonal){
        $mysqli = conexion();
        $consultaSQL = 'SELECT * FROM permisos WHERE idpersonal = ?';
        
        $stmt = $mysqli->prepare($consultaSQL);
        $stmt->bind_param(
            "s",
            $idpersonal
        );
        $stmt->execute();
    
        $lista = array();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
    
            $obj = new permisos();
            $obj->id = $row['id'];
            $obj->idpersonal = $row['idpersonal'];
            $obj->p_grissyVenta = $row['p_grissyVenta'];
            $obj->p_grissyArea = $row['p_grissyArea'];
            $obj->p_grissyCliente = $row['p_grissyCliente'];
            $obj->p_grissyConfiguraciones = $row['p_grissyConfiguraciones'];
            $obj->p_grissyProductoEmp = $row['p_grissyProductoEmp'];
            $obj->p_grissyPersonal = $row['p_grissyPersonal'];
            $obj->p_grissyProveedor = $row['p_grissyProveedor'];
            array_push($lista, $obj);
        }

        $stmt->close();
        $mysqli->close();
    
        return $lista; 
    }

?>