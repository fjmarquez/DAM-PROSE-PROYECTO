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
                if($_SESSION["admin"] == 1)
                {
                    require_once('../form/productoNuevo.php');
                }
                
            ?>
        </div>
    </div>

</body>

</html>