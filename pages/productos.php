<!DOCTYPE html>
<html lang="es">
    <?php
        require_once('partials/head.php');
    ?>
    <body>
        
        <?php
            require('partials/navbar.php');
        ?>

        <?php
            require_once('../class/ProductoDAO.php');

            $pDAO = new ProductoDAO();

            

            $productos = $pDAO->obtenerTodosLosProductos();

            //echo gettype($productos);

            //var_dump($productos);
            //print_r($productos);

            foreach($productos as $p) {
                ?>
                <div>
                    <h1> <?= $p->getName() ?></h1>
                    <p> <?= $p->getPrice() ?>€ </p>
                    <p> <?= $p->getShortDescription() ?> </p>
                    <p> <?= $p->getCategory()->getCategory() ?> </p>
                </div>
                <?php
            }
        ?> 
        
    </body>
</html>