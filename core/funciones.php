<?php

include("const.php");

function verificarRol($rol){

    switch ($rol) {
        case 'COCINERO':
            header('Location: '. direccionBase .'pages/cocina.php');
            break;
        case 'MOZO':
            header('Location: '. direccionBase);
            break;
        case 'CAJERO':
            header('Location: '. direccionBase .'pages/caja.php');
            break;
        case 'BARTENDER':
            header('Location: '. direccionBase .'pages/bar.php');
            break;
        default:
            header('Location: '. direccionBase .'pages/login.php');
            break;
    };

}

?>