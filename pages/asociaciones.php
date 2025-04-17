<?php

session_start();
require_once("../functions/tools.php");

if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 1) {
        echo mostrarLinkAsociacionDesdeNoticia();
    }

    if ($_SESSION['rol'] == 3) {
        echo mostrarLinkAdminDesdeNoticia();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asociaciones - Unidos Contra el Cáncer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="wrapper">

    </div>
    <!-- Barra de navegación -->
    <nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="../index.php">
                <img src="../img/logo-web.jpg" alt="Logo" class="me-2">
                <span>Unidos Contra el Cáncer</span>
            </a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" id="list-ul-nav">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="asociaciones.php">Asociaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="noticias.php">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="educacion.php">Educación</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login/login.php" id="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container my-5">
        <h1 class="text-center mb-5" style="color: #aa84de;">Asociaciones Colaboradoras</h1>

        <div class="text-center m-4">
            <img src="../img/asociacones/portada-asociacion.jpg" class="img-fluid rounded mb-3" alt="Portada asociaciones, manos unidas en contra del cancer." id="portada-asociacion">
        </div>

        <!-- 🔍 Campo de Búsqueda -->
        <div class="mb-3">
            <input type="text" id="busqueda" class="form-control form-control-sm w-50 mx-auto" placeholder="Buscar asociación por nombre..." onkeyup="buscarAsociaciones()">
        </div>

        <div class="row">
            <div id="resultadoBusqueda">
                <!-- Muestro todas las asociaciones disponibles -->
                <?php getAllAssociation(); ?>
            </div>
        </div>
    </main>

    <!-- Pie de página -->
    <footer id="footer-principal" class="text-white text-center py-4">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script>
        function buscarAsociaciones() {
            let termino = document.getElementById("busqueda").value;

            // Petición AJAX
            fetch(`process/buscar_asociaciones.php?q=${termino}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("resultadoBusqueda").innerHTML = data;
                });
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>