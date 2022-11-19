<?php

$inicio = 0; // Por defecto voy a estar en la primera página
if (isset($_GET["inicio"])) {
    $inicio = intval($_GET["inicio"]); // Pero si llega un nuevo dato por GET lo almaceno en una variable
}

// Realizo la consulta para traer solo 10 registros, teniendo en cuenta la página que quiero ver (seteada en inicio)
$consulta="SELECT cierres_de_mesas.id as id, cierres_de_mesas.nromesa as nroMesa, cierres_de_mesas.montoTotal as monto, usuarios.nombre as cajeroNombre, usuarios.apellido as cajeroApellido, cierres_de_mesas.descripcion as detalle, cierres_de_mesas.fechayhora as fecha FROM cierres_de_mesas JOIN usuarios ON cierres_de_mesas.idCajero = usuarios.id ORDER BY cierres_de_mesas.id DESC LIMIT $inicio,10;";

$resultado=mysqli_query($link,$consulta);

// También voy a contar cuantas páginas son en total
// Realizo una consulta que me diga cuantos registros hay
$consultaPaginas = "SELECT COUNT(cierres_de_mesas.id) as cantidad FROM cierres_de_mesas;";
$resultadoPaginas=mysqli_query($link,$consultaPaginas);
$Cantidadfilas = mysqli_fetch_assoc($resultadoPaginas);

// La cantidad de páginas va a ser la cantidad de registros dividido 5 registros que puedo mostrar por página.
// Necesito redondear para arriba.
$paginas = ceil( $Cantidadfilas["cantidad"] / 10);

?>