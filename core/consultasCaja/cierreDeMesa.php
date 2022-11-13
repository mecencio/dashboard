<?php

// Si llega por post los 4 datos indicados abajo
if (isset($_POST["nromesa"]) && isset($_POST["idCajero"]) && isset($_POST["montoTotal"]) && isset($_POST["descripcion"])) {

    $link = conectar();

    // Almaceno los datos necesarios para el insert en una variable
    $mesa =  $_POST["nromesa"];
    $cajero =  $_POST["idCajero"];
    $monto =  $_POST["montoTotal"];
    $descripcion =  $_POST["descripcion"];
    $fecha = date("Y-m-d,H:m:s");

    //Realizo el insert
    $consulta="INSERT INTO `cierres_de_mesas`(`id`, `nromesa`, `fechayhora`, `idCajero`, `montoTotal`, `descripcion`) VALUES (NULL, '$mesa', '$fecha', '$cajero', '$monto', '$descripcion');";

    if(mysqli_query($link,$consulta)) { // Si el INSERT se realiza correctamente.
        $idCierre = mysqli_insert_id($link); // Almaceno el ID del insert que se realizó

        // Actualizo todos los pedidos de la mesa para que idCierre sea igual al cierre creado
        $consultaUpdate = "UPDATE `pedidos` SET `idCierreDeMesa` = '$idCierre' WHERE `pedidos`.`nromesa` = '$mesa';";

        if(mysqli_query($link,$consultaUpdate)) { // Si el UPDATE se realiza correctamente.
            $resultadoUpdate = "Mesa cerrada correctamente"; // Guardo un mensaje de que se realizó correctamente
        } else {
            $errorUpdate = "No se pudo realizar el Cierre de la mesa (error update)"; // Sino almaceno el error.
        }

    } else {
        $errorUpdate = "No se pudo realizar el Cierre de la mesa (error Insert)"; // Sino almaceno el error.
    }


    unset($row);
    unset($idCierre);
    unset($mesa);
    unset($cajero);
    unset($monto);
    unset($descripcion);
    unset($fecha);
}
?>