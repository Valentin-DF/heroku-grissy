<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPersonal.php');

try {

    if (isset($_POST['idpersonal']) && isset($_POST['salariobase'])&& isset($_POST['bonificacionextra'])&& isset($_POST['descuentos']) && isset($_POST['totalsueldo'])) {
        $idpersonal = $_POST['idpersonal'];
        $salariobase = $_POST['salariobase'];
        $bonificacionextra = $_POST['bonificacionextra'];
        $descuentos = $_POST['descuentos'];
        $totalsueldo = $_POST['totalsueldo'];

       
            $mensaje  = array(
                "warning" => "true",
                "msj" => "Se Resgistro el salario del Personal ",
                "color" => "linear-gradient(to right, #2e8f39,#8cfaa4)"
            );
            GuardarRegistroSalarioDelMes($idpersonal,  $salariobase,$bonificacionextra,$descuentos,$totalsueldo);
            echo json_encode($mensaje);
        
    } else {
        $mensaje  = array(
            "warning" => "false",
            "msj" => "No se registro correctamente.",
            "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
        );
        echo json_encode($mensaje);
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
