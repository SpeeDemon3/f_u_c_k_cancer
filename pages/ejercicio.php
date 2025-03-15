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
    <title>Ejercicio Físico - Prevención del Cáncer</title>
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
            <h1 class="fw-bold" style="color:rgba(82, 14, 170, 0.9)">Ejercicio Físico y Prevención del Cáncer</h1>
            <p class="lead" style="color: grey">Mantenerse activo ayuda a reducir el riesgo de desarrollar cáncer y mejora la calidad de vida.</p>
        </div>
    </header>

    <!-- Sección Principal -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../img/educacion/ejercicio.jpg" class="img-fluid rounded shadow-lg" alt="Ejercicio físico">
            </div>
            <div class="col-md-6">
                <h2 style="color:rgb(125, 87, 175)">Beneficios del ejercicio en la prevención del cáncer</h2>
                <p>El ejercicio físico regular ayuda a fortalecer el sistema inmunológico, reducir la inflamación y mejorar el metabolismo.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>✔ Control del peso:</strong> La obesidad es un factor de riesgo para varios tipos de cáncer.</li>
                    <li class="list-group-item"><strong>✔ Reducción de inflamación:</strong> El ejercicio disminuye la inflamación en el cuerpo.</li>
                    <li class="list-group-item"><strong>✔ Mejora de la circulación:</strong> Favorece el transporte de oxígeno y nutrientes.</li>
                    <li class="list-group-item"><strong>✔ Regulación hormonal:</strong> Reduce niveles de estrógeno y testosterona asociados a ciertos cánceres.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Acordeón con Tipos de Ejercicio -->
    <div class="container mt-5">
        <h2 class="text-center mb-4" style="color:rgb(125, 87, 175)">Tipos de Ejercicio Recomendados</h2>
        <div class="accordion" id="accordionExercise">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ejercicioAerobico">
                        🏃‍♂️ Ejercicio Aeróbico
                    </button>
                </h2>
                <div id="ejercicioAerobico" class="accordion-collapse collapse show" data-bs-parent="#accordionExercise">
                    <div class="accordion-body">
                        <p>Caminata rápida, natación y ciclismo mejoran la capacidad cardiovascular y reducen el riesgo de cáncer de mama y colon.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ejercicioFuerza">
                        💪 Ejercicios de Fuerza
                    </button>
                </h2>
                <div id="ejercicioFuerza" class="accordion-collapse collapse" data-bs-parent="#accordionExercise">
                    <div class="accordion-body">
                        <p>Entrenamiento con pesas ayuda a aumentar la masa muscular y a mejorar el metabolismo, reduciendo factores de riesgo de cáncer.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ejercicioFlexibilidad">
                        🧘‍♀️ Ejercicios de Flexibilidad y Relajación
                    </button>
                </h2>
                <div id="ejercicioFlexibilidad" class="accordion-collapse collapse" data-bs-parent="#accordionExercise">
                    <div class="accordion-body">
                        <p>Yoga y estiramientos reducen el estrés y ayudan al bienestar general, factores clave en la prevención del cáncer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Educativo -->
    <div class="container mt-5 mb-5 text-center">
        <h2 class="text-center mb-4" style="color:rgb(125, 87, 175)">Video: Así previene el ejercicio físico los tumores</h2>
        <div class="d-flex justify-content-center">
            <div class="ratio ratio-16x9" style="max-width: 900px;">
                <iframe src="https://www.youtube.com/embed/plli5wvE-iI" title="La &quot;pastilla&quot; real contra el cáncer: así previene el ejercicio físico los tumores" allowfullscreen></iframe>
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
