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
            <h1 class="fw-bold">Síntomas Comunes del Cáncer</h1>
            <p class="lead">Conocer los síntomas puede ayudarte a detectarlo a tiempo.</p>
        </div>
    </header>

    <!-- Sección de información -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../img/educacion/sintomas.jpg" class="img-fluid rounded shadow-lg" alt="Síntomas del cáncer">
            </div>
            <div class="col-md-6">
                <h2 class="text-primary">¿Cuáles son los síntomas comunes?</h2>
                <p>Los síntomas del cáncer varían según el tipo, pero algunos signos generales pueden alertarte para buscar atención médica.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>✔ Pérdida de peso inexplicada:</strong> Sin cambios en dieta o ejercicio.</li>
                    <li class="list-group-item"><strong>✔ Fatiga extrema:</strong> Sensación de agotamiento constante.</li>
                    <li class="list-group-item"><strong>✔ Cambios en la piel:</strong> Aparición de lunares irregulares o heridas que no sanan.</li>
                    <li class="list-group-item"><strong>✔ Dolor persistente:</strong> No relacionado con lesiones o causas evidentes.</li>
                    <li class="list-group-item"><strong>✔ Sangrados inusuales:</strong> En orina, heces o al toser.</li>
                    <li class="list-group-item"><strong>✔ Cambios en los hábitos intestinales:</strong> Estreñimiento o diarrea prolongada.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Tabla de síntomas según tipo de cáncer -->
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Síntomas por Tipo de Cáncer</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Tipo de Cáncer</th>
                        <th>Síntomas Comunes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cáncer de Pulmón</td>
                        <td>Tos persistente, dolor en el pecho, dificultad para respirar.</td>
                    </tr>
                    <tr>
                        <td>Cáncer de Mama</td>
                        <td>Bultos en el pecho, cambios en la piel, secreción anormal del pezón.</td>
                    </tr>
                    <tr>
                        <td>Cáncer de Colon</td>
                        <td>Sangrado en heces, cambios en los hábitos intestinales, pérdida de peso.</td>
                    </tr>
                    <tr>
                        <td>Cáncer de Piel</td>
                        <td>Lunares asimétricos, cambios de color, heridas que no sanan.</td>
                    </tr>
                    <tr>
                        <td>Leucemia</td>
                        <td>Infecciones frecuentes, moretones sin motivo, fatiga extrema.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Acordeón de preguntas frecuentes -->
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Preguntas Frecuentes</h2>
        <div class="accordion" id="faqSintomas">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        ¿Todos los síntomas indican cáncer?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqSintomas">
                    <div class="accordion-body">
                        No. Muchos síntomas pueden estar relacionados con otras enfermedades menos graves. Sin embargo, si persisten, es importante consultar a un médico.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        ¿Cuándo debo acudir al médico?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqSintomas">
                    <div class="accordion-body">
                        Si experimentas síntomas persistentes por más de dos semanas, como dolor, fatiga o cambios en la piel, consulta a un profesional de salud.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Educativo -->
    <div class="container mt-5 mb-5 text-center">
        <h2 class="text-center text-primary mb-4">Video: Signos de Alerta del Cáncer</h2>
        <div class="d-flex justify-content-center mt-5">
            <div class="ratio ratio-16x9" style="max-width: 900px;">
                <iframe  src="https://www.youtube.com/embed/bYCcXcIZDCc" title="🛑¿CUÁLES SON LOS SÍNTOMAS DEL CÁNCER?" allowfullscreen></iframe>
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