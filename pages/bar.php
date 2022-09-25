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
                            <a class="nav-link active" href="bar.html">Bar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="caja.html">Caja</a>
                        </li>
                    </ul>
                    <a class="btn btn-outline-primary" role="button" href="login.html">Login</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="bar__inicio">
            <article class="bar__opacidad">
                <div class="bar__contenido">
                    <h1 class="bar__titulo">B A R</h1>
                </div>
            </article>
        </section>
        <section class="bar__pedidos container">
            <div class="card my-3 text-center w-50 mx-auto" >
                <div class="card-body">
                    <h5 class="card-title">Gin tonic</h5>
                    <p class="card-text">Comentarios: Sin pepino.</p>
                    <p class="card-text">Mozo: </p>
                    <p class="card-text">Mesa: </p>
                    <a href="#" class="btn btn-outline-primary">Entregado</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
            <div class="card my-3 text-center w-50 mx-auto" >
                <div class="card-body">
                    <h5 class="card-title">Cepita 500ml</h5>
                    <p class="card-text">Comentarios: </p>
                    <p class="card-text">Mozo: </p>
                    <p class="card-text">Mesa: </p>
                    <a href="#" class="btn btn-outline-primary">Entregado</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
            <div class="card my-3 text-center w-50 mx-auto" >
                <div class="card-body">
                    <h5 class="card-title">Cerveza Stella Artois 473ml</h5>
                    <p class="card-text">Comentarios: </p>
                    <p class="card-text">Mozo: </p>
                    <p class="card-text">Mesa: </p>
                    <a href="#" class="btn btn-outline-primary">Entregado</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
            <div class="card my-3 text-center w-50 mx-auto" >
                <div class="card-body">
                    <h5 class="card-title">Cerveza Stella Artois 473ml</h5>
                    <p class="card-text">Comentarios: </p>
                    <p class="card-text">Mozo: </p>
                    <p class="card-text">Mesa: </p>
                    <a href="#" class="btn btn-outline-primary">Entregado</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
            <div class="card my-3 text-center w-50 mx-auto" >
                <div class="card-body">
                    <h5 class="card-title">Fernet branca con Cola</h5>
                    <p class="card-text">Comentarios: </p>
                    <p class="card-text">Mozo: </p>
                    <p class="card-text">Mesa: </p>
                    <a href="#" class="btn btn-outline-primary">Entregado</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </section>
    </main>
    <footer class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </footer>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>