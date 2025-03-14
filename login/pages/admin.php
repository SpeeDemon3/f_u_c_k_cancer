<?php

    session_start();

    require_once("../../bd/functionBd.php");

    if (isset($_SESSION['rol']) && $_SESSION['rol'] != 3) {
        session_destroy();
        header("Location: ../login.php");
        exit();
    }

    // Si la sesion no existe volvemos a la pagina de login
    if(!isset($_SESSION['id'])  || !isset($_SESSION['rol']) || $_SESSION['rol'] != 3) {
        session_start();
        session_destroy();
        header("Location: ../login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../js/validateFormNew.js" defer></script>
</head>
<body class="bg-light">

    <!-- Barra de navegación -->
    <nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="../../img/logo-web.jpg" alt="Logo" class="me-2"> 
                <span>Panel de Administración</span>
            </a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" id="list-ul-nav">
                    <li class="nav-item"><a class="nav-link" href="../../index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/asociaciones.php">Asociaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/noticias.php">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/educacion.php">Educación</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="../logout.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        <div class="container mt-4">
            <h2 class="text-center">Gestión de Noticias</h2>

            <!-- Formulario para Agregar Noticias -->
            <div class="container p-4 mt-3 rounded shadow">
                <h4 class="text-center">Agregar Nueva Noticia</h4>
                <form action="../process/processNews.php" method="POST" enctype="multipart/form-data" id="add-new-form">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" required>
                        <span id="error-title" class="form-text" value="caracteres"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                        <span id="error-description" class="form-text"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*" required>
                        <span id="error-image" class="form-text"></span>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Publicar Noticia</button>
                    </div>
                </form>
            </div>

            <!-- Listado de Noticias -->
            <?php getNewsByUser($_SESSION['id']) ?>

            <!-- Sección para Administrar Asociaciones -->
            <h2 class="text-center mt-5">Gestión de Asociaciones</h2>

            <div class='table-responsive'>
                <?php getAssociationManagement() ?>
            </div>
        </div>
    </main>
        

    <!-- Pie de Página -->
    <footer id="footer-principal" class="text-white text-center py-4">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
