<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Bar</title>
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
                            <a class="nav-link" aria-current="page" href="../index.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cocina.html">Cocina</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bar.html">Bar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="caja.html">Caja</a>
                        </li>
                    </ul>
                    <a class="btn btn-outline-primary" role="button" href="login.html">Login</a>
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
        <section class="bar__pedidos container my-5">
            <h2 class="caja__subtitulo text-center">MESAS</h2>
            <div class="card w-50 mx-auto my-5">
                <div class="card-header text-center fw-bold">
                    MESA XX
                </div>
                <div class="card-header text-center fw-semibold">
                    Mozo/s
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-around">
                        Juan
                    </li>
                </ul>
                <div class="card-header text-center fw-semibold">
                    Pedido/s
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-around">
                        <div>Item</div>
                        <div>$ 1000</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-around">
                        <div>Item</div>
                        <div>$ 1000</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-around">
                        <div>Item</div>
                        <div>$ 1000</div>
                    </li>
                </ul>
                <div class="card-footer d-flex justify-content-around">
                    <div>Total</div>
                    <div>$ 3000</div>
                </div>
            </div>
            <div class="d-flex justify-content-end w-75">
                <a href="#" class="btn btn-outline-primary mx-2">Cerrar</a>
                <a href="caja.html" class="btn btn-outline-secondary mx-2">Volver</a>
            </div>
        </section>
        
    </main>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>