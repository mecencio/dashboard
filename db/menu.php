<?php

Include("const.php");
Include("conexion.php");


$link = conectar();

$consulta="SELECT * FROM items_menu ORDER BY tipo ASC";
$resultado=mysqli_query($link,$consulta);
//guardo los resultado en un array
$menu = array ();

while ($row = mysqli_fetch_array ($resultado, MYSQLI_ASSOC)) {
    array_push($menu, $row);
}

mysqli_free_result($resultado);

mysqli_close($link);

?>