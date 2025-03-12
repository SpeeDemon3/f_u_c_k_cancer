<?php
session_start();
require_once("../functions/tools.php");

if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 1) {
        echo mostrarLinkAsociacionDesdeNoticias();
    }
    if ($_SESSION['rol'] == 3) {
        echo mostrarLinkAdminDesdeNoticias();
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prevención del Cáncer - Información Completa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Barra de navegación -->
    <nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
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
                    <li class="nav-item"><a class="nav-link active" href="educacion.php">Educación</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login/login.php" id="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Encabezado -->
    <header class="text-black text-center py-5">
        <div class="container">
            <h1 class="fw-bold">Tipos de Tratamientos</h1>
            <p class="lead">Conoce las opciones para combatir el cáncer.</p>
        </div>
    </header>

    <!-- Sección de Tratamientos -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <img src="../img/educacion/tratamientos.jpg" class="img-fluid rounded mb-3" alt="Quimioterapia">
                        <h5 class="card-title text-primary">Quimioterapia</h5>
                        <p class="card-text">Uso de medicamentos para destruir células cancerosas en todo el cuerpo.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <img src="../img/educacion/radio.jpg" class="pb-4 img-fluid rounded mb-3" alt="Radioterapia">
                        <h5 class="card-title text-primary">Radioterapia</h5>
                        <p class="card-text">Uso de radiación para eliminar o reducir tumores en zonas específicas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <img src="../img/educacion/cirugia.jpg" class="pb-3 img-fluid rounded mb-3" alt="Cirugía">
                        <h5 class="card-title text-primary">Cirugía</h5>
                        <p class="card-text">Procedimiento para extirpar tumores y tejido afectado.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Más Tratamientos -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-primary">Otros Tratamientos</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>✔ Terapia Hormonal</strong> - Bloquea hormonas que favorecen el cáncer.</li>
                    <li class="list-group-item"><strong>✔ Inmunoterapia</strong> - Ayuda al sistema inmune a atacar células cancerosas.</li>
                    <li class="list-group-item"><strong>✔ Terapia Dirigida</strong> - Enfoca el tratamiento en células cancerosas sin dañar células sanas.</li>
                    <li class="list-group-item"><strong>✔ Cuidados Paliativos</strong> - Alivia síntomas y mejora la calidad de vida.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="../img/educacion/inmunoterapia.jpg" class="img-fluid rounded shadow-lg" alt="Inmunoterapia">
            </div>
        </div>
    </div>

    <!-- Preguntas Frecuentes -->
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Preguntas Frecuentes</h2>
        <div class="accordion" id="faqTratamientos">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        ¿Cuál es el tratamiento más efectivo?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqTratamientos">
                    <div class="accordion-body">
                        Depende del tipo de cáncer, la etapa en la que se encuentre y la respuesta del paciente. Un médico determinará la mejor opción.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        ¿Los tratamientos tienen efectos secundarios?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqTratamientos">
                    <div class="accordion-body">
                        Sí, pero varían según el tipo de tratamiento. Es importante discutir con el médico los efectos secundarios posibles.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Educativo -->
    <div class="container mt-5  mb-5">
        <h2 class="text-center text-primary mb-4">Video: Opciones de Tratamiento</h2>
        <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/VIDEO_ID" allowfullscreen></iframe>
        </div>
    </div>

    <!-- Pie de página -->
    <footer id="footer-principal" class="text-white text-center py-4 mt-auto">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>