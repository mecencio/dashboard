<?php

if (isset($_POST["pedido"]) && isset($_POST["mozo"]) && isset($_POST["mesa"])) {
    include("const.php");
    include("conexion.php");


    $link = conectar();

    $errores = array(); // Creo un array donde voy a almacenar todos los errores

    $pedidoID = $_POST['pedido']; // Copio en una variable el dato que pasa por post del item_menu
    $comentarios = $_POST['comentarios']; // Copio en una variable el dato que pasa por post del comentarios
    $mozo = $_POST['mozo']; // Copio en una variable el dato que pasa por post del mozo

    try {
        // pruebo convertir el dato de mesa en un int
        // Si se puede lo almaceno en una variable
        $mesa = intval($_POST['mesa']);
    } catch (Exception $e) {
        // Sino capturo el error
        array_push($errores, "'Caught exception: '.  $e->getMessage()");
        header('Location: '. direccionBase);
    }

    // Realizo una consulta en la bbdd para traer el mozo que coincida con el usuario
    // debería traer 1 o 0 mozos ya que el usuario del mozo es único.
    $consultaMozo="SELECT * FROM usuarios WHERE nombreusuario = '$mozo'";
    $resultadoMozo=mysqli_query($link,$consultaMozo); // Resultado de la consulta
    $rowMozo = mysqli_fetch_array ($resultadoMozo); // Array con los datos del resultado
    $filasMozo = mysqli_num_rows($resultadoMozo); // Cantidad de filas que trajo

    // idem mozo
    // En este caso el ID que es lo que se pasa es único. Por ende solo 1 o 0 resultados.
    $consultaPedido ="SELECT * FROM items_menu WHERE id = '$pedidoID'";
    $resultadoPedido =mysqli_query($link,$consultaPedido);
    $filasPedido = mysqli_num_rows($resultadoPedido);

    // Si el número de mesa está entre 1 y 12, encontré un usuario en la consulta que es mozo y además encontré 1 item en la consulta del menu
    if (($mesa <= 12) && ($mesa >= 1) && ($filasMozo == 1) && ($filasPedido == 1) && ($rowMozo['rol'] == "MOZO")) {
        $mozoID = $rowMozo['id']; // Guardo el dato del ID mozo porque lo voy a necesitar par hacer el insert
        $fechaHora = date("Y-m-d,H:m:s"); // Almaceno en una variable la fecha y hora tal como acepta SQL
        // Realizo el insert.
        $creacionPedido = "INSERT INTO `pedidos` (`id`, `nromesa`, `idMozo`, `idItemMenu`, `comentarios`, `fechayhora`, `entregado`) VALUES (NULL, $mesa, $mozoID, $pedidoID, '$comentarios', '$fechaHora', false);";
        if (mysqli_query($link, $creacionPedido)) { // Si el INSERT se realiza correctamente.
            $success = "Pedido ingresado correctamente"; // Guardo un mensaje de que se realizó correctamente
        } else {
            $aux = "Error: " . $creacionPedido . "<br>" . mysqli_error($link); // Sino almaceno el error.
            array_push($errores, $aux);
        }
    } else {
        // Si la mesa no estaba entre 1 y 12, almaceno el mensaje de error
        if (($mesa > 12) || ($mesa < 1)) {
            array_push($errores, "El número de la mesa debe ser entre 1 y 12"); 
        }
        // Si no se encontraron registros con ese usuario, almaceno el mensaje de error
        if (($filasMozo != 1)) {
            array_push($errores, "No existe un mozo con ese nombre");
        }
        // Si hay registros pero el usuario no es mozo , almaceno el mensaje de error
        if (($filasMozo == 1) && ($rowMozo["rol"] != "MOZO")) {
            array_push($errores, "El usuario ingresado no es un Mozo");
        }
        // Si no se encontraron registros con el ID del item menu, almaceno el mensaje de error
        if (($filasPedido != 1)) {
            array_push($errores, "El pedido ingresado no es correcto");
        }
    }

    mysqli_free_result($resultadoMozo);
    mysqli_free_result($resultadoPedido);


    mysqli_close($link);

    unset($_POST);
}
?>