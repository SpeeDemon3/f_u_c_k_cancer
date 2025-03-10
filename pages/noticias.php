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

// Configuracion de la base de datos
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bd_contra_cancer";

try {
    // Conexión a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cantidad de noticias por página
    $noticias_por_pagina = 3;

    // Obtener el numero de página actual
    $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    if ($pagina_actual < 1) {
        $pagina_actual = 1;
    }

    // Calcular el offset para la consulta SQL
    $offset = ($pagina_actual - 1) * $noticias_por_pagina;

    // Obtener el número total de noticias
    $stmt_total = $pdo->query("SELECT COUNT(*) FROM news");
    $total_noticias = $stmt_total->fetchColumn();
    $total_paginas = ceil($total_noticias / $noticias_por_pagina);

    // Consulta SQL con paginacion
    $stmt = $pdo->prepare("SELECT * FROM news ORDER BY fecha_publicacion DESC LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $noticias_por_pagina, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

} catch (PDOException $e) {
    die("<p class='text-danger text-center'>Error al conectar con la base de datos: " . $e->getMessage() . "</p>");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - Unidos Contra el Cáncer</title>
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
                    <li class="nav-item"><a class="nav-link" href="#">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="educacion.php">Educación</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login/login.php" id="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Encabezado -->
    <div class="container mt-4 flex-grow-1">
        <div class="d-flex justify-content-center align-items-center">
            <img src="../img/sec_noticias.jpg" class="img-fluid img-thumbnail rounded m-5 text-center" alt="Seccion de noticias, imagen de un medico">
        </div>

        <h2 class="text-center mb-4 mt-4">Últimas Noticias</h2>
        
        <!-- Sección de Noticias -->
        <div class="row">
            <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Limitar contenido a 200 caracteres
                    $contenido = htmlspecialchars($row["contenido"]);
                    $contenido_limitado = strlen($contenido) > 200 ? substr($contenido, 0, 350) . '...' : $contenido;
            ?>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <img src="../<?= htmlspecialchars($row["imagen_url"]) ?>" class="card-img-top" alt="Noticia">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row["titulo"]) ?></h5>
                                <p class="card-text"><?= $contenido_limitado ?></p>
                                <a href="../<?= htmlspecialchars($row["ruta_pagina"]) ?>" class="btn btn-primary" target="_blank">Leer más</a>
                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>

        <!-- Paginación -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php if ($pagina_actual > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?= $pagina_actual - 1 ?>" aria-label="Anterior">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <li class="page-item <?= $i == $pagina_actual ? 'active' : '' ?>">
                        <a class="page-link" href="?pagina=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($pagina_actual < $total_paginas): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?= $pagina_actual + 1 ?>" aria-label="Siguiente">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <!-- Pie de página -->
    <footer id="footer-principal" class="text-white text-center py-4 mt-auto">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
