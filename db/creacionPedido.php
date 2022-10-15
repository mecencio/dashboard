<?php

include("const.php");
include("conexion.php");


$link = conectar();
session_start();

$pedidoID = $_POST['pedido'];
$comentarios = $_POST['comentarios'];
try {
    $mesa = intval($_POST['mesa']);
} catch (Exception $e) {
    $_SESSION["resultado"] = "'Caught exception: '.  $e->getMessage()";
    header('Location: '. direccionBase);
}
$mozo = $_POST['mozo'];

$consultaMozo="SELECT * FROM usuarios WHERE nombreusuario = '$mozo'";
$resultadoMozo=mysqli_query($link,$consultaMozo);
$rowMozo = mysqli_fetch_array ($resultadoMozo); 
$filasMozo = mysqli_num_rows($resultadoMozo);

$consultaPedido ="SELECT * FROM items_menu WHERE id = '$pedidoID'";
$resultadoPedido =mysqli_query($link,$consultaPedido);
$filasPedido = mysqli_num_rows($resultadoPedido);

if (($mesa <= 12) && ($mesa >= 1) && ($filasMozo == 1) && ($filasPedido == 1) && ($rowMozo['rol'] == "MOZO")) {
    $mozoID = $rowMozo['id'];
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $fechaHora = date("Y-m-d,H:m:s");
    $creacionPedido = "INSERT INTO `pedidos` (`id`, `nromesa`, `idMozo`, `idItemMenu`, `comentarios`, `fechayhora`, `entregado`) VALUES (NULL, $mesa, $mozoID, $pedidoID, '$comentarios', '$fechaHora', false);";
    $_SESSION["resultado"] = $mozo;
    if (mysqli_query($link, $creacionPedido)) {
        $_SESSION["success"] = "Pedido ingresado correctamente";
    } else {
        $_SESSION["error"]["sql"] = "Error: " . $creacionPedido . "<br>" . mysqli_error($link);
    }
} else {
    if (($mesa > 12) || ($mesa < 1)) {
        $_SESSION["error"]["mesa"] = "El número de la mesa debe ser entre 1 y 12";
    }
    if (($filasMozo != 1)) {
        $_SESSION["error"]["mozo"] = "No existe un mozo con ese nombre";
    }
    if (($filasMozo == 1) && ($rowMozo["rol"] != "MOZO")) {
        $_SESSION["error"]["rol"] = "El usuario ingresado no es un Mozo";
    }
    if (($filasPedido != 1)) {
        $_SESSION["error"]["pedido"] = "El pedido ingresado no es correcto";
    }
}

header('Location: '. direccionBase);

mysqli_free_result($resultado);


mysqli_close($link);

?>