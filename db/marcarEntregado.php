<?php

if (isset($_GET["id"])) {

    Include("const.php");
    Include("conexion.php");

    $id = $_GET["id"];
    $link = conectar();

    $consulta="UPDATE pedidos SET entregado = 1 WHERE pedidos.id = $id";

    if (mysqli_query($link, $consulta)) { // Si el UPDATE se realiza correctamente.
        $resultadoUpdate = "Cambio realizado correctamente"; // Guardo un mensaje de que se realizó correctamente
    } else {
        $errorUpdate = "Error: " . $creacionPedido . "<br>" . mysqli_error($link); // Sino almaceno el error.
    }

    mysqli_close($link);

    header('Location: '. direccionBase .'pages/cocina.php');

}

?>