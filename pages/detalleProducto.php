<!DOCTYPE html>
<html lang="es">
<?php
require_once('partials/head.php');
require_once('../class/ProductoDAO.php');
$pID = $_GET['id'];
//echo $pID;
$pDAO = new ProductoDAO();
$producto = $pDAO->obtenerProductoPorID($pID);
//var_dump($producto);
?>

<body>
    <?php require_once('partials/navbar.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <img class="card-img" src="<?= $producto->getImage() ?>" title="<?= $producto->getName() . " - "  . $producto->getCategory()->getCategory() ?>">
            </div>
            <div class="col-md-7">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="productos.php">Productos</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $producto->getCategory()->getCategory() ?></li>
                    </ol>
                </nav>
                <div class="">
                    <h2 class=""><?= $producto->getName() ?></h2>
                </div>
                <div class="mb-3">
                    <?php
                    if ($producto->getPrime() == 1) {
                    ?>
                        <img src="../img/prime.png" height="6%" width="10%">
                    <?php
                    }
                    ?>
                </div>
                <div class="details price">
                <div>
                    <?php
                    if ($producto->getStock() == 0) {
                    ?>
                        <div class="alert alert-secondary text-center" title="<?= $producto->getStock() ?>" role="alert">
                            ¡Vaya! Lo sentimos mucho, pero este producto no esta disponible
                        </div>
                    <?php
                    } elseif ($producto->getStock() < 5) {
                    ?>
                        <div class="alert alert-warning text-center" title="<?= $producto->getStock() ?>" role="alert">
                            ¡Corre! Quedan muy pocas unidades
                        </div>
                    <?php
                    }else{
                        ?>
                        <div class="alert alert-success text-center" title="<?= $producto->getStock() ?>" role="alert">
                            ¡Estas de suerte! En stock
                        </div>
                        <?php
                    }
                    ?>
                </div>
                    <?php
                    if ($producto->getDiscount() != null) {
                    ?>
                        <div class="alert alert-primary col-md-12 text-center" title="<?= $producto->getStock() ?>" role="alert">
                            <?= $producto->getDiscount() * 100 ?>% de decuento
                        </div>
                        <div class="row">
                            <h5 class="text-danger priceNoDiscount ml-3">
                                <?=
                                    $producto->getPrice()

                                ?>€
                            </h5>
                            <h5 class="text-success priceDiscount ml-3">
                                <?=
                                    $producto->getPrice() - ($producto->getDiscount() * $producto->getPrice())

                                ?>€
                            </h5>
                        </div>

                    <?php
                    } else {
                    ?>
                        <h5 class="text-success"><?= $producto->getPrice() ?> €</h5>
                    <?php
                    }
                    ?>
                </div>
                <div class="mt-3 mb-4">
                    <p><?= $producto->getLongDescription() ?></p>
                </div>
                <div>
                    <button type="button" class="btn btn-primary shop-button col-md-12 mb-1">Add to Cart</button>
                    <button type="button" class="btn btn-success shop-button col-md-12">Buy Now</button>
                </div>

            </div>
        </div>
    </div>

</body>

</html>