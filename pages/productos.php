<!DOCTYPE html>
<html lang="es">
    <?php
        require_once('partials/head.php');
        require('partials/navbar.php');
        require_once('../class/ProductoDAO.php');
        $pDAO = new ProductoDAO();
        $productos = $pDAO->obtenerTodosLosProductos();
    ?>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php
                    foreach($productos as $p) {
                ?>
                <div class="col-md-3">
                    <h1> <?= $p->getName() ?></h1>
                    <p> <?= $p->getPrice() ?>€ </p>
                    <p> <?= $p->getShortDescription() ?> </p>
                    <p> <?= $p->getCategory()->getCategory() ?> </p>
                </div>
                <?php
                    }
                ?> 
            </div>
        </div>
    </body>
</html>