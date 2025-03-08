<?php

    session_start();

    // Verificar si el usuario está autenticado
    if (!isset($_SESSION['id']) || !isset($_SESSION['rol'])) {
        session_start();
        session_destroy();
        header("Location: ../login.php");
        exit();
    }

    require_once(__DIR__ . "/../../bd/functionBd.php");

    // Verificar si el parámetro 'id' está presente en la URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // Recuperar el id de la URL
        $id = $_GET['id'];

        // Validar que el id sea un número entero
        if (is_numeric($id)) {
            $id = intval($id); // Convertir a entero

            deleteNew($id);

            // Dependiendo del rol del usuario redirijo a una pagina u otra
            if($_SESSION['rol'] == 1) {
                header("Location: asociacion.php");
            } 

            if($_SESSION['rol'] == 3) {
                header("Location: admin.php");
            }

        } else {
            echo "El ID no es válido.";
        }

    } else {
        echo "No se proporcionó un ID.";
    }
?>