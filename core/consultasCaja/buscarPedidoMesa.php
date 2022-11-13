<?php

if(isset($_GET["nromesa"])) {
    $mesa = $_GET["nromesa"];
    $consulta="SELECT items_menu.nombre as pedido, usuarios.nombre as nombre, usuarios.apellido as apellido, pedidos.nromesa as mesa, items_menu.precio as precio FROM pedidos JOIN items_menu ON items_menu.id = pedidos.idItemMenu JOIN usuarios ON pedidos.idMozo = usuarios.id WHERE ((pedidos.nromesa = $mesa) AND (pedidos.idCierreDeMesa IS NULL)) ORDER BY fechayhora DESC;";
    
    $resultado=mysqli_query($link,$consulta);
    $cantidadFilas = mysqli_num_rows($resultado);
    
    $consultaTotal = "SELECT SUM(items_menu.precio) as precio FROM pedidos JOIN items_menu ON items_menu.id = pedidos.idItemMenu WHERE ((pedidos.nromesa = $mesa) AND (pedidos.idCierreDeMesa IS NULL));";
    $resultadoTotal = mysqli_query($link,$consultaTotal);
    $TotalGastado = mysqli_fetch_assoc($resultadoTotal);
    
}

?>