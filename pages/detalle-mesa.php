<?php 
Include("../core/const.php");
Include("../core/conexion.php");
Include("../core/objetos.php");

$link = conectar();
session_start();

if (isset($_SESSION['usuario'])){
    if ($_SESSION['usuario']->getRol() != "CAJERO") {
        $_SESSION['usuario']->verificarRol();
    };
} else {
    header('Location: '. direccionBase .'pages/login.php');
}

include("../core/consultasCaja/buscarPedidoMesa.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Caja</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light header">
            <div class="container">
                <p class="navbar-brand header__marca p-2">DOS Restó</p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="caja.php">Caja</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle usuario" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hola, <?php echo $_SESSION['usuario']->getNombre();  ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard/core/logout.php">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="caja__inicio">
            <article class="caja__opacidad">
                <div class="caja__contenido">
                    <h1 class="caja__titulo">C A J A</h1>
                </div>
            </article>
        </section>
        <?php
            if(isset($cantidadFilas) && ($cantidadFilas > 0)) {
        ?>
        <section class="bar__pedidos container my-5">
            <h2 class="caja__subtitulo text-center">MESAS</h2>
            <div class="card w-50 mx-auto my-5">
                <div class="card-header text-center fw-bold">
                    MESA <?php echo $mesa ?>
                </div>
                <div class="card-header fw-semibold">
                    <div class="row justify-content-around text-center">
                        <div class="col-3">Item menu</div>
                        <div class="col-3">Precio</div>
                        <div class="col-3">Mozo</div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <?php
                        while ($item = mysqli_fetch_assoc ($resultado)) {
                    ?>
                        <li class="list-group-item">
                            <div class="row justify-content-around text-center">
                                <div class="col-3"><?php echo $item["pedido"] ?></div>
                                <div class="col-3"><?php echo $item["precio"] ?></div>
                                <div class="col-3"><?php echo $item["nombre"] . " " . $item["apellido"] ?></div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                    <div class="card-footer d-flex justify-content-around fw-semibold">
                        <div>Total</div>
                        <div>$ <?php echo $TotalGastado["precio"] ?></div>
                    </div>
            </div>
            <div class="d-flex justify-content-end w-75" id="contenedorCerrar">
                <a class="btn btn-outline-primary mx-2 shadow-none" id="botonCerrar">Cerrar</a>
                <a href="caja.php" class="btn btn-outline-secondary mx-2 shadow-none">Volver</a>
            </div>
            <form action="caja.php?nromesa=<?php echo $mesa ?>" class="visually-hidden" id="form" method="POST">
                <div class="card w-50 mx-auto mb-4">
                    <input type="text" class="visually-hidden" value="<?php echo $mesa;  ?>" name="nromesa" readonly>
                    <input type="text" class="visually-hidden" value="<?php echo $_SESSION['usuario']->getId();  ?>" name="idCajero" readonly>
                    <input type="text" class="visually-hidden" value="<?php echo $TotalGastado["precio"];  ?>" name="montoTotal" readonly>
                    <p class="card-header fw-semibold ">Ingresar descripción: </p>
                    <div class="d-flex justify-content-center">
                        <textarea class="form-control border border-0 rounded-top-0 shadow-none" name="descripcion" cols="30" rows="3"></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end w-75">
                    <button type="submit" class="btn btn-outline-primary mx-2 shadow-none">Cerrar</button>
                    <a href="caja.php" class="btn btn-outline-secondary mx-2 shadow-none">Volver</a>
                </div>
            </form>
        </section>
        <?php
            } else if (isset($cantidadFilas)) {
        ?>
        <section class="bar__pedidos container my-5">
            <h2 class="caja__subtitulo text-center">MESAS</h2>
            <div class="card w-50 mx-auto my-5">
                <div class="card-header text-center fw-bold">
                    MESA <?php echo $mesa ?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row justify-content-around text-center">
                            <div>La mesa no tiene pedidos</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-end w-75">
                <a href="caja.php" class="btn btn-outline-secondary mx-2 shadow-none">Volver</a>
            </div>
        </section>
        <?php
            } else {
        ?>
        <section class="bar__pedidos container my-5">
            <h2 class="caja__subtitulo text-center">MESAS</h2>
            <div class="row ">
                <div class="btn btn-danger my-5 mx-auto w-75 disabled"><?php echo $errorBusqueda ?></div>
            </div>
            <div class="d-flex justify-content-end w-75">
                <a href="caja.php" class="btn btn-outline-secondary mx-2 shadow-none">Volver</a>
            </div>
        </section>
        <?php
            }
        ?>
    </main>
    <script src="../js/detalle-mesa.js"></script>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>