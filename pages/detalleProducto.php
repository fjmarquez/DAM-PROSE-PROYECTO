<!DOCTYPE html>
<html lang="es">
<?php
require_once('partials/head.php');
?>

<body>
    <?php require_once('partials/navbar.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php
                if($_SESSION["admin"] == 0)
                {
                    require_once('partials/productoCliente.php');
                }
                else
                {
                    require_once('../form/formProductoAdmin.php');
                }

                require_once('partials/valoracionesProducto.php');
            ?>
        </div>
    </div>

</body>

</html>