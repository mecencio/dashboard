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

include("../core/consultasCaja/cierreDeMesa.php");
include("../core/consultasCaja/tienePedidosLaMesa.php");

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
        <section class="bar__pedidos container my-3">
            <div class="row mb-5">
                <div class="col-3 mx-auto">
                    <a href="EstadisticaPlatos.php" class="btn btn-outline-primary mx-2 shadow-none">Platos más consumidos</a>
                </div>
                <div class="col-3 mx-auto">
                    <a href="estadisticaMozos.php" class="btn btn-outline-primary mx-2 shadow-none">Mozos que más vendieron</a>
                </div>
                <div class="col-3 mx-auto">
                    <a href="historicoMesasCerradas.php" class="btn btn-outline-primary mx-2 shadow-none">Listado de mesas cerradas</a>
                </div>
            </div>
            <h2 class="caja__subtitulo text-center">MESAS</h2>
            <div class="row my-3 text-center">
                <?php
                    if (isset($resultadoUpdate)) {
                ?>
                        <div class="btn btn-success w-75 mx-auto disabled"><?php echo $resultadoUpdate ?></div>
                <?php
                        unset($resultadoUpdate);
                    }
                    if (isset($error)) {
                ?>
                        <div class="btn btn-danger w-75 mx-auto disabled"><?php echo $error ?></div>
                <?php
                    unset($error);
                    }
                ?>
            </div>
            <div class="row">
                <?php
                    for ($i=0; $i<12;$i++) {
                ?>
                <a href="detalle-mesa.php?nromesa=<?php echo $i+1 ?>" class="col-3 py-3">
                    <div class="card card-body">
                        <?php if ($pedidosMesa[$i] != 0) {
                        ?>
                            <h3 class="card-title mx-auto my-auto text-danger fw-bold"><?php echo $i+1 ?></h3>
                        <?php } else {
                        ?>
                            <h3 class="card-title mx-auto my-auto text-success fw-bold"><?php echo $i+1 ?></h3>
                        <?php
                        }
                        ?>
                    </div>
                </a>
                <?php
                    }
                ?>
            </div>
        </section>
    </main>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>