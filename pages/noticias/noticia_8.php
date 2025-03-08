
        <?php
        require_once('../../bd/functionBd.php');
        $titulo = "Test 1";
        $descripcion = "Test 1 Test 1 Test 1";
        $imagen = "../../img/noticias/67b96e3b918ec_noticas-4.jpg";
        ?>
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title><?php echo $titulo; ?></title>
            <link rel='stylesheet' href='../../css/styles.css'>
        </head>
        <body>
            <div class='container'>
                <h1><?php echo $titulo; ?></h1>
                <img src='<?php echo $imagen; ?>' alt='Noticia' width='100%'>
                <p><?php echo $descripcion; ?></p>
                <a href='../../index.php'>Volver al inicio</a>
            </div>
        </body>
        </html>
        