<?php

Include("const.php");
Include("conexion.php");

$link = conectar();

$consulta="SELECT items_menu.id as id, items_menu.nombre as item, pedidos.comentarios as comentario, usuarios.nombre as nombre, usuarios.apellido as apellido, pedidos.nromesa as mesa, pedidos.fechayhora as fecha, items_menu.tipo as tipo FROM pedidos JOIN items_menu ON items_menu.id = pedidos.idItemMenu JOIN usuarios ON pedidos.idMozo = usuarios.id WHERE pedidos.entregado = 0 ORDER BY fechayhora DESC;";

$resultado=mysqli_query($link,$consulta);
$filas = mysqli_num_rows($resultado); // Cantidad de filas que trajo
//guardo los resultado en un array
$pedidosSinEntregar = array ();

if ($lugar == "cocina") {
    $tipoPedido = "COMIDA";
} else {
    $tipoPedido = "BEBIDA";
}

while ($row = mysqli_fetch_array ($resultado, MYSQLI_ASSOC)) {
    array_push($pedidosSinEntregar, $row);
}

$pedidosDelLugar = array();

$inicio = 1;
$limite = 5;
if (isset($_GET["inicio"]) && isset($_GET["limite"])) {
    $inicio = intval($_GET["inicio"]);
    $limite = intval($_GET["limite"]);
}

$cant = 1;
foreach($pedidosSinEntregar as $a) {
    if (($a["tipo"] == $tipoPedido)){
        if (($cant >= $inicio) && ($cant <= $limite)) {
            array_push($pedidosDelLugar, $a);
        }
        $cant += 1;
    }
}
unset($pedidosSinEntregar);
unset($inicio);
unset($limite);
unset($cant);

$paginas = intdiv($filas, 5);

if ($paginas < ($filas / 5)) {
    $paginas += 1;
}

mysqli_free_result($resultado);

mysqli_close($link);

?>