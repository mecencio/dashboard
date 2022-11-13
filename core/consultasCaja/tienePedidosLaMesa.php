<?php

$pedidosMesa = array();

// Para las 12 mesas que tengo en el local
for ($i = 1; $i <= 12; $i++) {
    // Cuento cuantos pedidos tiene la mesa
    $consultaMesa = "SELECT COUNT(pedidos.id) as cantidad FROM pedidos WHERE (pedidos.nromesa = $i) AND (pedidos.idCierreDeMesa IS NULL);";
    $resultadoMesa = mysqli_query($link,$consultaMesa);
    $cantidadPedidosMesa = mysqli_fetch_assoc($resultadoMesa);

    array_push($pedidosMesa, $cantidadPedidosMesa["cantidad"]); // Almaceno el resultado en un array
}

mysqli_close($link);

?>