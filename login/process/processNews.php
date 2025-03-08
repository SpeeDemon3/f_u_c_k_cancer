<?php
    session_start(); // Iniciar sesión para obtener el ID del usuario

    require_once(__DIR__ . '/../../bd/functionBd.php');
    require_once(__DIR__ . '/../../functions/tools.php');

    // Si la sesion no existe volvemos a la pagina de login
    if(!isset($_SESSION['id'])  || !isset($_SESSION['rol'])) {
        session_start();
        session_destroy();
        header("Location: ../login.php");
        exit();
    }

    // Obtener datos del formulario y validarlos
    if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
    }

    if (isset($_POST['descripcion']) && !empty($_POST['descripcion'])) {
        $descripcion = $_POST['descripcion'];
    }

    $usuario_id = $_SESSION['id']; // ID del usuario que crea la noticia

    // Procesar la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $carpeta_imagenes = __DIR__ . '/../../img/noticias/'; // Ruta donde se guardarán las imágenes
        if (!is_dir($carpeta_imagenes)) {
            mkdir($carpeta_imagenes, 0777, true); // Crear la carpeta si no existe
        }

        $nombre_archivo = uniqid() . '_' . basename($_FILES['imagen']['name']); // Nombre único para evitar colisiones
        $ruta_imagen = $carpeta_imagenes . $nombre_archivo;

        // Mover la imagen a la carpeta de destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
            // Insertar la noticia en la base de datos
            require_once(__DIR__ . "/../../bd/functionBd.php");

            // Guardar la ruta relativa de la imagen en la base de datos
            $ruta_imagen_db = 'img/noticias/' . $nombre_archivo;

            // Insertar noticia y obtener ID
            $noticia_id = insertNewPrep($titulo, $descripcion, $ruta_imagen_db, $usuario_id);

            if ($noticia_id) {
                // Crear la página de la noticia y obtener su ruta
                $ruta_pagina = crearPaginaNoticia($noticia_id, $titulo, $descripcion, $ruta_imagen_db);

                // Guardar la ruta en la base de datos
                updateNoticiaPath($noticia_id, $ruta_pagina);

                // Redirigir al usuario
                if($_SESSION['rol'] == 1) {
                    header("Location: ../pages/asociacion.php");
                    exit();
                }
                if($_SESSION['rol'] == 3) {
                    header("Location: ../pages/admin.php");
                    exit();
                }
            } else {
                die("Error al guardar la noticia en la base de datos.");
            }

        } else {
            die("Error al subir la imagen.");
        }
    } else {
        die("Error: No se ha subido ninguna imagen.");
    }
?>