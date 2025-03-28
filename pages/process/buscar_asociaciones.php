<?php
require_once("../../functions/tools.php");

$q = isset($_GET['q']) ? trim($_GET['q']) : "";

function getFilteredAssociations($q)
{
    global $con;
    $query = "SELECT * FROM associations WHERE nombre_asociacion LIKE '%$q%'";
    $result = mysqli_query($con, $query) or die("Error en la consulta");

    if (mysqli_num_rows($result) > 0) {
        echo "            
            <table class='table table-striped mt-3'>
                <thead class='table-dark'>
                    <tr>
                        <th class='text-center align-middle'>Nombre Asociación</th>
                        <th class='text-center align-middle d-none'>Correo</th>
                        <th class='text-center align-middle d-none d-sm-table-cell'>Descripción</th>
                        <th class='text-center align-middle'>Logo</th>
                        <th class='text-center align-middle d-none d-sm-table-cell'>Teléfono</th>
                        <th class='text-center align-middle d-none d-sm-table-cell'>Sitio Web</th>
                        <th class='text-center align-middle'>Página</th>
                    </tr>
                </thead>
                <tbody>
        ";

        while ($row = mysqli_fetch_array($result)) {
            extract($row);
            $descripcion_limited = strlen($descripcion) > 100 ? substr($descripcion, 0, 100) . '...' : $descripcion;
            echo "
                <tr>
                    <td class='text-center align-middle'>$nombre_asociacion</td>
                    <td class='text-center align-middle d-none'>$email</td>
                    <td class='text-center align-middle d-none d-sm-table-cell'>$descripcion_limited</td>
                    <td class='text-center align-middle'>
                        <img src='../$logo' alt='Logo' width='50' height='50' style='object-fit: cover; border-radius: 5px;'>
                    </td>
                    <td class='text-center align-middle d-none d-sm-table-cell'>$telefono</td>
                    <td class='text-center align-middle d-none d-sm-table-cell'>
                        <a style='color:#9e5af9; text-decoration: none;' href='$sitio_web' target='_blank'>$sitio_web</a>
                    </td>
                    <td class='text-center align-middle'>
                        <a href='../$pagina' class='btn btn-dark btn-sm'>Ver Página</a>
                    </td>
                </tr>
            ";
        }

        echo "
                </tbody>
            </table>
        ";
    } else {
        echo "<p class='text-center text-muted'>No se encontraron asociaciones.</p>";
    }
}

getFilteredAssociations($q);
?>
