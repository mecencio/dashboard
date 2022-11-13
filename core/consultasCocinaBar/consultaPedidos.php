<?php

// Pregunto desde que lugar estoy entrando
if ($lugar == "cocina") { // En caso de ser cocina
    $tipoPedido = "COMIDA"; // Voy a almacenar que el tipo de comida es bebida (para poder filtrar despues en la consulta)
} else {
    $tipoPedido = "BEBIDA"; // Sino Bebida
}

$inicio = 0; // Por defecto voy a estar en la primera página
if (isset($_GET["inicio"])) {
    $inicio = intval($_GET["inicio"]); // Pero si llega un nuevo dato por GET lo almaceno en una variable
}

// Realizo la consulta para traer solo 5 registros, teniendo en cuenta la página que quiero ver (seteada en inicio)
$consulta="SELECT pedidos.id as id, items_menu.id as idItem, items_menu.nombre as item, pedidos.comentarios as comentario, usuarios.nombre as nombre, usuarios.apellido as apellido, pedidos.nromesa as mesa, pedidos.fechayhora as fecha, items_menu.tipo as tipo FROM pedidos JOIN items_menu ON items_menu.id = pedidos.idItemMenu JOIN usuarios ON pedidos.idMozo = usuarios.id WHERE ((pedidos.entregado = 0) AND (items_menu.tipo = '$tipoPedido')) ORDER BY fechayhora DESC LIMIT $inicio,5;";

$resultado=mysqli_query($link,$consulta);

// También voy a contar cuantas páginas son en total
// Realizo una consulta que me diga cuantos registros hay que no hayan sido entregados y sean del tipo establecido arriba
$consultaPaginas = "SELECT COUNT(pedidos.id) as cantidad FROM pedidos JOIN items_menu ON items_menu.id = pedidos.idItemMenu WHERE ((pedidos.entregado = 0) AND (items_menu.tipo = '$tipoPedido'));";
$resultadoPaginas=mysqli_query($link,$consultaPaginas);
$Cantidadfilas = mysqli_fetch_assoc($resultadoPaginas);

// La cantidad de páginas va a ser la cantidad de registros dividido 5 registros que puedo mostrar por página.
// Necesito redondear para arriba.
$paginas = ceil( $Cantidadfilas["cantidad"] / 5);

?>