<?php

Include("const.php");
Include("conexion.php");


$link = conectar();

session_start();
$consulta="SELECT * FROM items_menu ORDER BY tipo ASC";
$resultado=mysqli_query($link,$consulta);
//guardo los resultado en un array
$_SESSION['menu'] = array ();
$cont = 0;

while ($row = mysqli_fetch_array ($resultado, MYSQLI_ASSOC)) {
    $_SESSION['menu'][$cont] = $row;
    $cont++;
}
mysqli_free_result($resultado);

mysqli_close($link);

header('Location: '. direccionBase);

?>