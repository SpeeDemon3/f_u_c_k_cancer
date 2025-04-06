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

// Configuración de la base de datos
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

    // Obtener el número de página actual
    $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    if ($pagina_actual < 1) {
        $pagina_actual = 1;
    }

    // Calcular el offset para la consulta SQL
    $offset = ($pagina_actual - 1) * $noticias_por_pagina;

    // Obtener el término de búsqueda (si existe)
    $busqueda = isset($_GET['busqueda']) ? trim($_GET['busqueda']) : '';

    if ($busqueda) {
        // Consulta con filtro de búsqueda
        $stmt_total = $pdo->prepare("SELECT COUNT(*) FROM news WHERE titulo LIKE :busqueda OR contenido LIKE :busqueda");
        $busqueda_param = "%$busqueda%";
        $stmt_total->bindParam(':busqueda', $busqueda_param, PDO::PARAM_STR);
        $stmt_total->execute();
    } else {
        // Consulta sin filtro (todas las noticias)
        $stmt_total = $pdo->query("SELECT COUNT(*) FROM news");
    }

    // Obtener el número total de noticias
    $total_noticias = $stmt_total->fetchColumn();
    $total_paginas = ceil($total_noticias / $noticias_por_pagina);

    // Consulta principal
    if ($busqueda) {
        $stmt = $pdo->prepare("SELECT * FROM news WHERE titulo LIKE :busqueda OR contenido LIKE :busqueda ORDER BY fecha_publicacion DESC LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':busqueda', $busqueda_param, PDO::PARAM_STR);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM news ORDER BY fecha_publicacion DESC LIMIT :limit OFFSET :offset");
    }

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
            <img src="../img/sec_noticias.jpg" class="img-fluid img-thumbnail rounded m-5 text-center" style="width: 700px;" alt="Seccion de noticias, imagen de un medico">
        </div>

        <h2 class="text-center mb-5 mt-4 fs-1 font-monospace" style="color: #aa84de;">Últimas Noticias</h2>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="" class="mb-5 mt-4" style="width: 300px;">
            <div class="input-group input-group-sm">
                <input type="text" id="search-input" class="form-control" name="busqueda" placeholder="Buscar noticias..." value="<?= isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : '' ?>">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Sección de Noticias -->
        <div class="row">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contenido = htmlspecialchars($row["contenido"]);
                $contenido_limitado = strlen($contenido) > 200 ? substr($contenido, 0, 350) . '...' : $contenido;
            ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100 d-flex flex-column shadow-sm">
                        <img src="../<?= htmlspecialchars($row["imagen_url"]) ?>" class="card-img-top fixed-img" height="300px" alt="Noticia">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($row["titulo"]) ?></h5>
                            <p class="card-text flex-grow-1"><?= $contenido_limitado ?></p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="../<?= htmlspecialchars($row["ruta_pagina"]) ?>" class="btn btn-primary mt-auto btn-custom">Leer más</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Paginación -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php if ($pagina_actual > 1): ?>
                    <li class="page-item m-3">
                        <a class="page-link" href="?pagina=<?= $pagina_actual - 1 ?>&busqueda=<?= urlencode($busqueda) ?>" aria-label="Anterior">&laquo;</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <li class="m-3 page-item <?= $i == $pagina_actual ? 'active' : '' ?>">
                        <a class="page-link" href="?pagina=<?= $i ?>&busqueda=<?= urlencode($busqueda) ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($pagina_actual < $total_paginas): ?>
                    <li class="m-3 page-item">
                        <a class="page-link" href="?pagina=<?= $pagina_actual + 1 ?>&busqueda=<?= urlencode($busqueda) ?>" aria-label="Siguiente">&raquo;</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <!-- Pie de página -->
    <footer id="footer-principal" class="text-white text-center py-4 mt-auto">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script>
        document.getElementById("search-input").addEventListener("input", function() {
            if (this.value.trim() === "") {
                window.location.href = window.location.pathname; // Recarga la página sin parámetros
            }
        });
    </script>

</body>

</html>