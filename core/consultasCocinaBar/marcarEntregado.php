<?php
// Si recibo por GET un id:
if (isset($_GET["id"])) {

    // Copio el valor en una variable.
    $id = $_GET["id"];
    $consulta="UPDATE pedidos SET entregado = 1 WHERE pedidos.id = $id";

    // Realizo una consulta para actualizar el valor de entregado a 1
    if (mysqli_query($link, $consulta)) { // Si el UPDATE se realiza correctamente.
        $resultadoUpdate = "Cambio realizado correctamente"; // Guardo un mensaje de que se realizó correctamente
    } else {
        $errorUpdate = "El pedido ingresado no es válido"; // Sino almaceno el error.
    }
}

?>