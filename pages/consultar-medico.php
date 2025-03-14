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
    <title>Cuando consultar al médico - Unidos Contra el Cáncer</title>
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
            <h1 class="fw-bold">¿Cuándo Consultar al Médico?</h1>
            <p class="lead">Reconoce las señales y actúa a tiempo para una mejor salud.</p>
        </div>
    </header>

    <!-- Sección de información -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../img/educacion/consultar-medico.jpg" class="img-fluid rounded shadow-lg" alt="Consulta médica">
            </div>
            <div class="col-md-6">
                <h2 class="text-primary">Síntomas que requieren atención médica</h2>
                <p>Si presentas alguno de estos síntomas durante más de dos semanas, es recomendable que consultes a un médico:</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>✔ Pérdida de peso inexplicable</strong></li>
                    <li class="list-group-item"><strong>✔ Fatiga extrema</strong></li>
                    <li class="list-group-item"><strong>✔ Dolor persistente sin causa aparente</strong></li>
                    <li class="list-group-item"><strong>✔ Cambios en la piel</strong> (manchas, lunares irregulares)</li>
                    <li class="list-group-item"><strong>✔ Sangrados inusuales</strong> (heces, orina, tos con sangre)</li>
                    <li class="list-group-item"><strong>✔ Bultos anormales en cualquier parte del cuerpo</strong></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Preguntas Frecuentes -->
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Preguntas Frecuentes</h2>
        <div class="accordion" id="faqConsulta">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        ¿Cuánto tiempo debo esperar antes de consultar?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqConsulta">
                    <div class="accordion-body">
                        Si un síntoma persiste más de dos semanas o empeora, consulta a un médico lo antes posible.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        ¿Debo esperar a sentir dolor para consultar?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqConsulta">
                    <div class="accordion-body">
                        No. El cáncer en sus primeras etapas suele ser silencioso, por lo que es importante acudir a chequeos regulares.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Educativo -->
    <div class="container mt-5 mb-5 text-center">
        <h2 class="text-center text-primary mb-4">Video: La Importancia de la Detección Temprana del Cáncer</h2>
        <div class="d-flex justify-content-center mt-5">
            <div class="ratio ratio-16x9" style="max-width: 900px;">
                <iframe  src="https://www.youtube.com/embed/33NTpSi4vQI" title="La Importancia de la Detección Temprana del Cáncer ⚕️" allowfullscreen></iframe>
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