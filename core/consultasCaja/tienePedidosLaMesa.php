<?php

$pedidosMesa = array();

for ($i = 1; $i <= 12; $i++) {
    $consultaMesa = "SELECT COUNT(pedidos.id) as cantidad FROM pedidos WHERE (pedidos.nromesa = $i) AND (pedidos.idCierreDeMesa IS NULL);";
    $resultadoMesa = mysqli_query($link,$consultaMesa);
    $cantidadPedidosMesa = mysqli_fetch_assoc($resultadoMesa);

    array_push($pedidosMesa, $cantidadPedidosMesa["cantidad"]);
}

mysqli_close($link);

?>