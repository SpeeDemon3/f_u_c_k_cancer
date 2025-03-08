
        <?php
        require_once('../../bd/functionBd.php');
        $titulo = "1";
        $descripcion = "2";
        $imagen = "../../img/noticias/67b5aaf13466b_extra-5.jpg";
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
        