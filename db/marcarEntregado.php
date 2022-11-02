<?php

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $consulta="UPDATE pedidos SET entregado = 1 WHERE pedidos.id = $id";

    if (mysqli_query($link, $consulta)) { // Si el UPDATE se realiza correctamente.
        $resultadoUpdate = "Cambio realizado correctamente"; // Guardo un mensaje de que se realizó correctamente
    } else {
        $errorUpdate = "Error: " . $creacionPedido . "<br>" . mysqli_error($link); // Sino almaceno el error.
    }
}

?>