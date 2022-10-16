<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPersonal.php');

try {
    echo json_encode(personalSinPagarEnElMEs(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
