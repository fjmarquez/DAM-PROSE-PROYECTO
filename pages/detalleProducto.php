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
            </div>
        </div>
    </div>

</body>

</html>