<?php

require_once(__DIR__ . "/../bd/functionBd.php");

/**
 * Metodo para generar una url unica para la pagina creada
 */
function generarUrlUnica($title)
{
    // Convertir el título a una URL amigable
    $url = strtolower(trim($title));
    $url = preg_replace('/[^a-z0-9-]/', '-', $url); // Reemplazar caracteres no válidos
    $url = preg_replace('/-+/', '-', $url); // Eliminar múltiples guiones
    $url = substr($url, 0, 100); // Limitar la longitud de la URL

    // Añadir un identificador único para evitar colisiones
    $url .= '-' . uniqid();

    return $url;
}

/**
 * Metodo para crear una nueva pagina html al crear una noticia
 */
function crearPaginaNoticiaV0($noticia_id, $titulo, $descripcion, $ruta_imagen_db)
{
    $nombre_pagina = "noticia_" . $noticia_id . ".php";
    $ruta_pagina = __DIR__ . "/../pages/noticias/" . $nombre_pagina;

    // Contenido de la página de la noticia
    $contenido = "
        <?php
        require_once('../../bd/functionBd.php');
        \$titulo = \"$titulo\";
        \$descripcion = \"$descripcion\";
        \$imagen = \"../../$ruta_imagen_db\";
        ?>
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title><?php echo \$titulo; ?></title>
            <link rel='stylesheet' href='../../css/styles.css'>
        </head>
        <body>
            <div class='container'>
                <h1><?php echo \$titulo; ?></h1>
                <img src='<?php echo \$imagen; ?>' alt='Noticia' width='100%'>
                <p><?php echo \$descripcion; ?></p>
                <a href='../../index.php'>Volver al inicio</a>
            </div>
        </body>
        </html>
        ";

    // Guardar el archivo en `pages/noticias/`
    file_put_contents($ruta_pagina, $contenido);

    // Devolver la ruta relativa para guardarla en la BD
    return "pages/noticias/" . $nombre_pagina;
}

/**
 * Metodo para crear una nueva pagina html al crear una noticia
 */
function crearPaginaNoticia($noticia_id, $titulo, $descripcion, $ruta_imagen_db)
{
    // Validar y sanitizar los datos
    $noticia_id = intval($noticia_id); // Asegurar que el ID sea un entero
    $titulo = htmlspecialchars($titulo); // Sanitizar el título
    $descripcion = htmlspecialchars($descripcion); // Sanitizar la descripción
    $ruta_imagen_db = htmlspecialchars($ruta_imagen_db); // Sanitizar la ruta de la imagen

    // Nombre del archivo y ruta
    $nombre_pagina = "noticia_" . $noticia_id . ".php";
    $ruta_pagina = __DIR__ . "/../pages/noticias/" . $nombre_pagina;

    // Contenido de la página de la noticia
    $contenido = <<<HTML
        

    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$titulo</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="../../css/style.css">
        </head>
        <body>

            <div id="page-container">

                <!-- Barra de navegación -->
                <nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand d-flex align-items-center" href="#">
                            <img src="../../img/logo-web.jpg" alt="Logo" class="me-2"> 
                            <span>Unidos Contra el Cáncer</span>
                        </a>

                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav" id="list-ul-nav">
                                <li class="nav-item"><a class="nav-link" href="../../index.php">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link" href="../asociaciones.php">Asociaciones</a></li>
                                <li class="nav-item"><a class="nav-link" href="../noticias.php">Noticias</a></li>
                                <li class="nav-item"><a class="nav-link" href="../educacion.php">Educación</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <main class="container my-5">
                    <h1 class="text-center mb-4 font-monospace"  style="color:rgb(88, 34, 162);">$titulo</h1>
                    <div class="text-center mb-4">
                        <img src="../../$ruta_imagen_db" alt="$titulo" class="web-noticia-imagen img-fluid web-noticia-imagen" style="max-width: 60%; height: auto; border-radius: 10px;">
                    </div>
                    <div class="web-noticia-contenido text-center mx-auto" style="max-width: 800px; font-size: 1.1rem; line-height: 1.6;">
                        <p>$descripcion</p>
                    </div>
                    <div class="text-center mt-5">
                        <a href="../../index.php" class="btn btn-dark">Volver al inicio</a>
                    </div>
                </main>
            
                <footer id="footer-principal" class="text-white text-center py-4" style="margin-top: auto;">
                    <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
                </footer>
            </div>

        
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        </body>
    </html>
    HTML;

    // Crear la carpeta si no existe
    $carpeta_noticias = __DIR__ . "/../pages/noticias/";
    if (!is_dir($carpeta_noticias)) {
        mkdir($carpeta_noticias, 0777, true);
    }

    // Guardar el archivo
    if (file_put_contents($ruta_pagina, $contenido) === false) {
        die("Error al crear la página de la noticia.");
    }

    // Devolver la ruta relativa para guardarla en la BD
    return "pages/noticias/" . $nombre_pagina;
}


/**
 * Metodo para mostrar un enlace
 */
function mostrarLinkAdmin()
{
    return '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const a = document.getElementById("login");
                    if (a) {
                        a.href = "login/pages/admin.php";
                        a.innerHTML = "Panel de Control";

                        // Crear el botón de "Salir"
                        const logoutItem = document.createElement("li");
                        logoutItem.classList.add("nav-item");

                        const logoutLink = document.createElement("a");
                        logoutLink.classList.add("nav-link", "text-danger");
                        logoutLink.href = "../login/logout.php";  
                        logoutLink.innerHTML = "Salir";

                        logoutItem.appendChild(logoutLink);

                        // Agregar el botón de salir al menú de navegación
                        document.getElementById("list-ul-nav").appendChild(logoutItem);
                    } else {
                        console.error("El elemento no fue encontrado.");
                    }
                });
            </script>
        ';
}

/**
 * Metodo para mostrar un enlace
 */
function mostrarLinkAsociacion()
{
    return '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const a = document.getElementById("login");
                    if (a) {
                        a.href = "login/pages/asociacion.php";
                        a.innerHTML = "Panel de Control";

                        // Crear el botón de "Salir"
                        const logoutItem = document.createElement("li");
                        logoutItem.classList.add("nav-item");

                        const logoutLink = document.createElement("a");
                        logoutLink.classList.add("nav-link", "text-danger");
                        logoutLink.href = "../login/logout.php";  
                        logoutLink.innerHTML = "Salir";

                        logoutItem.appendChild(logoutLink);

                        // Agregar el botón de salir al menú de navegación
                        document.getElementById("list-ul-nav").appendChild(logoutItem);
                    } else {
                        console.error("El elemento no fue encontrado.");
                    }
                });
            </script>
        ';
}


/**
 * Metodo para mostrar un enlace
 */
function mostrarLinkAdmindesdeIndex()
{
    return '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const a = document.getElementById("login");
                    if (a) {
                        a.href = "login/pages/admin.php";
                        a.innerHTML = "Panel de Control";

                        // Crear el botón de "Salir"
                        const logoutItem = document.createElement("li");
                        logoutItem.classList.add("nav-item");

                        const logoutLink = document.createElement("a");
                        logoutLink.classList.add("nav-link", "text-danger");
                        logoutLink.href = "login/logout.php";  
                        logoutLink.innerHTML = "Salir";

                        logoutItem.appendChild(logoutLink);

                        // Agregar el botón de salir al menú de navegación
                        document.getElementById("list-ul-nav").appendChild(logoutItem);
                    } else {
                        console.error("El elemento no fue encontrado.");
                    }
                });
            </script>
        ';
}

/**
 * Metodo para mostrar un enlace
 */
function mostrarLinkAsociacionDesdeIndex()
{
    return '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const a = document.getElementById("login");
                    if (a) {
                        a.href = "login/pages/asociacion.php";
                        a.innerHTML = "Panel de Control";

                        // Crear el botón de "Salir"
                        const logoutItem = document.createElement("li");
                        logoutItem.classList.add("nav-item");

                        const logoutLink = document.createElement("a");
                        logoutLink.classList.add("nav-link", "text-danger");
                        logoutLink.href = "login/logout.php";  
                        logoutLink.innerHTML = "Salir";

                        logoutItem.appendChild(logoutLink);

                        // Agregar el botón de salir al menú de navegación
                        document.getElementById("list-ul-nav").appendChild(logoutItem);
                    } else {
                        console.error("El elemento no fue encontrado.");
                    }
                });
            </script>
        ';
}

/**
 * Metodo para mostrar un enlace
 */
function mostrarLinkAdminDesdeNoticias()
{
    return '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const a = document.getElementById("login");
                    if (a) {
                        a.href = "../login/pages/admin.php";
                        a.innerHTML = "Panel de Control";

                        // Crear el botón de "Salir"
                        const logoutItem = document.createElement("li");
                        logoutItem.classList.add("nav-item");

                        const logoutLink = document.createElement("a");
                        logoutLink.classList.add("nav-link", "text-danger");
                        logoutLink.href = "../login/logout.php";  
                        logoutLink.innerHTML = "Salir";

                        logoutItem.appendChild(logoutLink);

                        // Agregar el botón de salir al menú de navegación
                        document.getElementById("list-ul-nav").appendChild(logoutItem);
                    } else {
                        console.error("El elemento no fue encontrado.");
                    }
                });
            </script>
        ';
}

/**
 * Metodo para mostrar un enlace
 */
function mostrarLinkAsociacionDesdeNoticias()
{
    return '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const a = document.getElementById("login");
                    if (a) {
                        a.href = "../login/pages/asociacion.php";
                        a.innerHTML = "Panel de Control";

                        // Crear el botón de "Salir"
                        const logoutItem = document.createElement("li");
                        logoutItem.classList.add("nav-item");

                        const logoutLink = document.createElement("a");
                        logoutLink.classList.add("nav-link", "text-danger");
                        logoutLink.href = "../login/logout.php";  
                        logoutLink.innerHTML = "Salir";

                        logoutItem.appendChild(logoutLink);

                        // Agregar el botón de salir al menú de navegación
                        document.getElementById("list-ul-nav").appendChild(logoutItem);
                    } else {
                        console.error("El elemento no fue encontrado.");
                    }
                });
            </script>
        ';
}

/**
 * Metodo para mostrar un enlace
 */
function mostrarLinkAdminDesdeNoticia()
{
    return '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const a = document.getElementById("login");
                    if (a) {
                        a.href = "../login/pages/admin.php";
                        a.innerHTML = "Panel de Control";

                        // Crear el botón de "Salir"
                        const logoutItem = document.createElement("li");
                        logoutItem.classList.add("nav-item");

                        const logoutLink = document.createElement("a");
                        logoutLink.classList.add("nav-link", "text-danger");
                        logoutLink.href = "../login/logout.php";  
                        logoutLink.innerHTML = "Salir";

                        logoutItem.appendChild(logoutLink);

                        // Agregar el botón de salir al menú de navegación
                        document.getElementById("list-ul-nav").appendChild(logoutItem);
                    } else {
                        console.error("El elemento no fue encontrado.");
                    }
                });
            </script>
        ';
}

/**
 * Metodo para mostrar un enlace
 */
function mostrarLinkAsociacionDesdeNoticia()
{
    return '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const a = document.getElementById("login");
                    if (a) {
                        a.href = "../../login/pages/asociacion.php";
                        a.innerHTML = "Panel de Control";

                        // Crear el botón de "Salir"
                        const logoutItem = document.createElement("li");
                        logoutItem.classList.add("nav-item");

                        const logoutLink = document.createElement("a");
                        logoutLink.classList.add("nav-link", "text-danger");
                        logoutLink.href = "../../login/logout.php";  
                        logoutLink.innerHTML = "Salir";

                        logoutItem.appendChild(logoutLink);

                        // Agregar el botón de salir al menú de navegación
                        document.getElementById("list-ul-nav").appendChild(logoutItem);
                    } else {
                        console.error("El elemento no fue encontrado.");
                    }
                });
            </script>
        ';
}

/**
 * Metodo para generar pagina de cada asociacion
 */
function generarPaginaAsociacion($name, $descripcion, $urlImage, $phone, $webSite)
{
    // Sanitizar los datos
    $name = htmlspecialchars(trim($name));
    $descripcion = htmlspecialchars($descripcion);
    $urlImage = htmlspecialchars($urlImage);
    $phone = htmlspecialchars($phone);
    $webSite = htmlspecialchars($webSite);

    // Definir la ruta base donde se guardarán las páginas
    $carpeta_asociaciones = __DIR__ . "/../pages/asociaciones-web/";

    // Crear la carpeta si no existe
    if (!is_dir($carpeta_asociaciones)) {
        mkdir($carpeta_asociaciones, 0777, true); // Permisos adecuados
    }

    // Generar un slug para la URL (nombre del archivo)
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
    $filePath = $carpeta_asociaciones . $slug . ".php";

    // Contenido de la página
    $contenido = <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>$name - Asociación</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../css/style.css">
    </head>
    <body>

        <div id="page-container">

            <!-- Barra de navegación -->
            <nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand d-flex align-items-center" href="../../index.php">
                        <img src="../../img/logo-web.jpg" alt="Logo" class="me-2"> 
                        <span>Unidos Contra el Cáncer</span>
                    </a>

                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav" id="list-ul-nav">
                            <li class="nav-item"><a class="nav-link" href="../../index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="../asociaciones.php">Asociaciones</a></li>
                            <li class="nav-item"><a class="nav-link" href="../noticias.php">Noticias</a></li>
                            <li class="nav-item"><a class="nav-link" href="../educacion.php">Educación</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="container my-5">
                <h1 class="text-center mb-4 font-monospace" style="color:rgb(88, 34, 162);">$name</h1>
                <div class="text-center mb-4">
                    <img src="../../$urlImage" alt="$name" class="img-fluid rounded shadow-lg" style="max-width: 60%; height: auto; border-radius: 10px;">
                </div>
                <div class="web-asociacion-contenido text-center mx-auto" style="max-width: 800px; font-size: 1.1rem; line-height: 1.6;">
                    <p>$descripcion</p>
                    <p><strong>Teléfono:</strong> $phone</p>
                    <p><strong>Sitio Web:</strong> <a href="$webSite" target="_blank">$webSite</a></p>
                </div>
                <div class="text-center mt-5">
                    <a href="../../index.php" class="btn btn-dark">Volver al inicio</a>
                </div>
            </main>

            <footer id="footer-principal" class="text-white text-center py-4" style="margin-top: auto;">
                <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados.</p>
            </footer>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    HTML;

    // Guardar el archivo
    if (file_put_contents($filePath, $contenido) === false) {
        die("Error al crear la página de la asociación.");
    }

    // Retornar la ruta relativa para guardarla en la BD
    return "pages/asociaciones-web/" . $slug . ".php";
}


function generarPaginaAsociacion1($name, $descripcion, $urlImage, $phone, $webSite)
{
    // Definir la ruta base donde se guardarán las páginas
    $carpeta_asociaciones = __DIR__ . "/../pages/asociaciones-web/";

    // Crear la carpeta si no existe
    if (!is_dir($carpeta_asociaciones)) {
        mkdir($carpeta_asociaciones, 0775, true); // Permisos adecuados para Apache/Nginx
    }

    // Generar un slug para la URL (nombre en formato de archivo)
    $slug = strtolower(str_replace(" ", "-", trim($name)));
    $filePath = $carpeta_asociaciones . $slug . ".php";

    // Contenido de la página
    $contenido = <<<HTML
        <?php
        session_start();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$name - Asociación</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="../index.php">Unidos Contra el Cáncer</a>
                </div>
            </nav>
    
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="../../$urlImage" class="img-fluid rounded shadow-lg" alt="$name">
                    </div>
                    <div class="col-md-8">
                        <h1 class="text-primary">$name</h1>
                        <p>$descripcion</p>
                        <p><strong>Teléfono:</strong> $phone</p>
                        <p><strong>Sitio Web:</strong> <a href="$webSite" target="_blank">$webSite</a></p>
                    </div>
                </div>
            </div>
    
            <footer class="text-center py-3 mt-5 bg-dark text-white">
                <p>&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados.</p>
            </footer>
        </body>
        </html>
        HTML;

    // Escribir el archivo
    if (file_put_contents($filePath, $contenido) !== false) {
        return "asociaciones-web/" . $slug . ".php"; // Devuelve la ruta relativa para almacenarla en la BD
    } else {
        return false;
    }
}
