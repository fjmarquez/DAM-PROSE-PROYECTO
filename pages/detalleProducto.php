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
    <?php require_once('partials/navbar.php');?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" >
                <img class="card-img" src="<?= $producto->getImage() ?>" title="<?= $producto->getName() . " - "  . $producto->getCategory()->getCategory() ?>">
            </div>
            <div class="col-md-6" >
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Productos</li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $producto->getCategory()->getCategory() ?></li>
                    </ol>
                </nav>
                <div>
                    <h3><?= $producto->getName() ?></h3>
                </div>
                <div>
                    <?php
                    if($producto->getPrime() == 1)
                    {
                        ?>
                        <h5>Prime</h5>
                        <?php
                    }
                    ?>
                </div>
                <div>
                    <label><?= $producto->getPrice() ?> €</label>
                    <?php
                        if($producto->getDiscount() != null)
                        {
                            ?>
                            <label>Discount: <?= $producto->getDiscount() ?>%</label>
                            <?php
                        }
                    ?>
                </div>
                <div>
                    <p><?= $producto->getLongDescription() ?></p>
                </div>
                <div>
                    <p>Stock: <?= $producto->getStock()?></p>
                </div>
                <div class="row">
                    <div class="col-xs-6"> <button type="button" class="btn btn-primary shop-button">Add to Cart</button> <button type="button" class="btn btn-success shop-button">Buy Now</button>
                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>