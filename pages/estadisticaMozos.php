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

include("../core/estadisticas/mozosMasVendieron.php");

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
        <section class="cocina__pedidos container container my-3">
            <h2 class="caja__subtitulo text-center">Mozos que más vendieron</h2>
                <?php
                    $i = 1;
                    while ($mozo = mysqli_fetch_assoc ($resultado)) {
                ?>
                <div class="card my-3 text-center w-50 mx-auto row">
                    <div class="d-flex flex-row align-items-center">
                    <img src="../resources/premio<?php echo $i++ ?>.png" class="img-fluid p-4 " style="width: 200px; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $mozo['nombre']. " " . $mozo['apellido']?></h5>
                        <p class="card-text">Cantidad: <?php echo $mozo['cantidad'] ?></p>
                    </div>
                    </div>
                </div>
                <?php
                    }
                    unset($i);
                ?>
            <div class="d-flex justify-content-end w-75">
                <a href="caja.php" class="btn btn-outline-secondary mx-2 shadow-none">Volver</a>
            </div>
        </section>
    </main>
    <script src="../js/detalle-mesa.js"></script>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>