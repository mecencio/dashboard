<?php

if ($lugar == "cocina") {
    $tipoPedido = "COMIDA";
} else {
    $tipoPedido = "BEBIDA";
}

$inicio = 0;
if (isset($_GET["inicio"])) {
    $inicio = intval($_GET["inicio"]);
}

$consulta="SELECT pedidos.id as id, items_menu.id as idItem, items_menu.nombre as item, pedidos.comentarios as comentario, usuarios.nombre as nombre, usuarios.apellido as apellido, pedidos.nromesa as mesa, pedidos.fechayhora as fecha, items_menu.tipo as tipo FROM pedidos JOIN items_menu ON items_menu.id = pedidos.idItemMenu JOIN usuarios ON pedidos.idMozo = usuarios.id WHERE ((pedidos.entregado = 0) AND (items_menu.tipo = '$tipoPedido')) ORDER BY fechayhora DESC LIMIT $inicio,5;";

$resultado=mysqli_query($link,$consulta);


$consultaPaginas = "SELECT COUNT(pedidos.id) as cantidad FROM pedidos JOIN items_menu ON items_menu.id = pedidos.idItemMenu WHERE ((pedidos.entregado = 0) AND (items_menu.tipo = '$tipoPedido'));";
$resultadoPaginas=mysqli_query($link,$consultaPaginas);
$Cantidadfilas = mysqli_fetch_assoc($resultadoPaginas);

$paginas = ceil( $Cantidadfilas["cantidad"] / 5);

?>