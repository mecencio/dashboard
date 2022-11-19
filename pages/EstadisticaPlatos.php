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

include("../core/estadisticas/platosMasConsumidos.php");

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
        <section class="caja__inicio" id="inicio">
            <article class="caja__opacidad">
                <div class="caja__contenido">
                    <h1 class="caja__titulo">C A J A</h1>
                </div>
            </article>
        </section>
        <section class="cocina__pedidos container container my-3">
            <div class="d-flex justify-content-end w-75 mb-5">
                <a href="caja.php" class="btn btn-outline-secondary mx-2 shadow-none">Volver</a>
            </div>
            <h2 class="caja__subtitulo text-center">PLATOS MÁS CONSUMIDOS</h2>
            <?php
                while ($item = mysqli_fetch_assoc ($resultado)) {
            ?>
                <div class="card my-3 text-center w-50 mx-auto row">
                    <div class="d-flex flex-row align-items-center">
                    <img src="../core/mostrarImagen.php?id=<?php echo $item["idItem"] ?>" class="img-fluid p-4 " style="width: 300px; height: 171px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item["nombre"] ?></h5>
                        <p class="card-text">Cantidad: <?php echo $item["cantidad"] ?></p>
                        <p class="card-text">Precio: $ <?php echo $item["precio"] ?></p>
                    </div>
                    </div>
                </div>
            <?php
                }
            ?>
            <div class="d-flex justify-content-end">
                <a href="#inicio">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="gray" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                    </svg>
                </a>
            </div>
        </section>
    </main>
    <script src="../js/detalle-mesa.js"></script>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>