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
    <title>Quimioterapia - Unidos Contra el Cáncer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

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
                    <li class="nav-item"><a class="nav-link active" href="educacion.php">Educación</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login/login.php" id="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Encabezado -->
    <header class="text-black text-center py-5">
        <div class="container">
            <h1 class="fw-bold" style="color:rgba(82, 14, 170, 0.9)">Quimioterapia</h1>
            <p class="lead" style="color: grey">Un tratamiento clave en la lucha contra el cáncer.</p>
        </div>
    </header>

    <!-- Introducción -->
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 style="color:rgb(125, 87, 175)">¿Qué es la Quimioterapia?</h2>
                <p class="text-muted">
                    La quimioterapia es un tratamiento que utiliza medicamentos para destruir células cancerosas. Puede usarse sola o en combinación con otros tratamientos como radioterapia o cirugía.
                </p>
            </div>
            <div class="col-md-6">
                <img src="../img/educacion/quimioter.jpg" class="img-fluid rounded shadow-lg" alt="Quimioterapia">
            </div>
        </div>
    </div>

    <!-- Beneficios y Efectos Secundarios -->
    <div class="container mt-5">
        <h2 class="text-center mb-4" style="color:rgb(125, 87, 175)">Beneficios y Efectos Secundarios</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title text-success">Beneficios</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">✔ Elimina o reduce tumores.</li>
                            <li class="list-group-item">✔ Previene la propagación del cáncer.</li>
                            <li class="list-group-item">✔ Puede usarse antes o después de una cirugía.</li>
                            <li class="list-group-item">✔ Aumenta las tasas de supervivencia.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Efectos Secundarios</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">❌ Náuseas y vómitos.</li>
                            <li class="list-group-item">❌ Pérdida de cabello.</li>
                            <li class="list-group-item">❌ Fatiga y debilidad.</li>
                            <li class="list-group-item">❌ Cambios en el apetito.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preguntas Frecuentes -->
    <div class="container mt-5">
        <h2 class="text-center mb-4" style="color:rgb(125, 87, 175)">Preguntas Frecuentes</h2>
        <div class="accordion" id="faqQuimioterapia">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        ¿Cómo se administra la quimioterapia?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqQuimioterapia">
                    <div class="accordion-body">
                        Se puede administrar por vía intravenosa, en pastillas o inyecciones subcutáneas, dependiendo del tipo de cáncer.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        ¿Cuánto dura el tratamiento?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqQuimioterapia">
                    <div class="accordion-body">
                        La duración depende del tipo de cáncer y la respuesta del paciente, pero generalmente varía de semanas a meses en ciclos intercalados.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Educativo -->
    <div class="container mt-5 mb-5 text-center">
        <h2 class="text-center mb-4" style="color:rgb(125, 87, 175)">Video: ¿Cómo Funciona la Quimioterapia?</h2>
        <div class="d-flex justify-content-center mt-5">
            <div class="ratio ratio-16x9" style="max-width: 900px;">
                <iframe  src="https://www.youtube.com/embed/_se6R9yJrmw" title="Combatiendo el cáncer: ¿Qué es y cómo funciona la quimioterapia?" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer id="footer-principal" class="text-white text-center py-4 mt-auto">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>