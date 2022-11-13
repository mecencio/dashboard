<?php

// Si llega por GET el número de mesa y está entre 1 y 12: 
if(isset($_GET["nromesa"]) && ($_GET["nromesa"] >= 1) && ($_GET["nromesa"] <=12)) {
    // Copio en una variable el número de mesa.
    $mesa = $_GET["nromesa"];
    // Traigo todos los pedidos que coinciden con ese número de mesa y que no tiene id de cierre de mesa
    $consulta="SELECT items_menu.nombre as pedido, usuarios.nombre as nombre, usuarios.apellido as apellido, pedidos.nromesa as mesa, items_menu.precio as precio FROM pedidos JOIN items_menu ON items_menu.id = pedidos.idItemMenu JOIN usuarios ON pedidos.idMozo = usuarios.id WHERE ((pedidos.nromesa = $mesa) AND (pedidos.idCierreDeMesa IS NULL)) ORDER BY fechayhora DESC;";
    
    $resultado=mysqli_query($link,$consulta);
    $cantidadFilas = mysqli_num_rows($resultado); // Almaceno la cantidad de filas que retorno
    
    // Realizó la suma total de los precios de todos los productos que coinciden con el número de mesa y que no tiene id de cierre de mesa
    $consultaTotal = "SELECT SUM(items_menu.precio) as precio FROM pedidos JOIN items_menu ON items_menu.id = pedidos.idItemMenu WHERE ((pedidos.nromesa = $mesa) AND (pedidos.idCierreDeMesa IS NULL));";
    $resultadoTotal = mysqli_query($link,$consultaTotal);
    $TotalGastado = mysqli_fetch_assoc($resultadoTotal); // Lo guardo en una variable
    
} else if (isset($_GET["nromesa"]) && !($_GET["nromesa"] >= 1) || !($_GET["nromesa"] <=12)) {
    // Si llego un número por GET pero no está entre 1 y 12:
    // Almaceno un error para mostrar en pantalla
    $errorBusqueda = "El número de mesa al que intenta ingresar no es válido.";
}

?>