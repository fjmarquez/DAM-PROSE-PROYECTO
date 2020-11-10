<?php
require_once('../class/ProductoDAO.php');
require_once('../class/CategoriaDAO.php');
$pID = $_GET['id'];
//echo $pID;
$pDAO = new ProductoDAO();
$producto = $pDAO->obtenerProductoPorID($pID);
$cDAO = new CategoriaDAO();
$categorias = $cDAO->obtenerTodasLasCategorias();
//var_dump($producto);
?>

<div class="col-md-5">
    <img class="card-img" src="<?= $producto->getImage() ?>" title="<?= $producto->getName() . " - " . $producto->getCategory()->getCategory() ?>">
</div>
<div class="col-md-7">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="productos.php">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $producto->getCategory()->getCategory() ?></li>
        </ol>
    </nav>
    <form method="post" enctype="multipart/form-data" action="../action/actionProducto.php">
        <input id="IDProducto" name="IDProducto" hidden value="<?= $pID ?>">
        <div class="form-group row">
            <label class="col-md-4" for="nombreProducto">Nombre: </label>
            <input id="nombreProducto" name="nombreProducto" class="form-control col-md-8" type="text" maxlength="100" value="<?= $producto->getName() ?>">
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="stockProducto">Stock: </label>
            <input id="stockProducto" name="stockProducto" class="form-control col-md-8" type="number" min="0" max="99999999999" value="<?= $producto->getStock() ?>">
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="precioProducto">Precio: </label>
            <input id="precioProducto" name="precioProducto" class="form-control col-md-7" type="number" step=".01" min="1" value="<?= $producto->getPrice() ?>">
            <div class="input-group-prepend col-md-1">
                <span class="input-group-text" id="basic-addon1">€</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="descuentoProducto">Descuento: </label>
            <input id="descuentoProducto" name="descuentoProducto" class="form-control col-md-8" type="number" step=".1" min="0" max="1" value="<?= $producto->getDiscount() ?>">
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="descripcionProducto">Descripción: </label>
            <textarea id="descripcionProducto" name="descripcionProducto" class="form-control col-md-8" maxlength="900"><?= $producto->getLongDescription() ?> </textarea>
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="primeProducto">Prime: </label>
            <input id="primeProducto" name="primeProducto" type="checkbox" <?php
                                                                            if ($producto->getPrime() == 1) {
                                                                                echo "checked";
                                                                            }
                                                                            ?>>
        </div>
        <div class="form-group row">
            <select id="categoriaProducto" name="categoriaProducto" class="form-control">
                <option disabled>Categoría</option>
                <?php
                foreach ($categorias as $categoria) {
                ?>
                    <option value="<?= $categoria->getID() ?>" <?php if ($categoria->getID() == $producto->getCategory()->getID()) {
                                                                    echo "selected";
                                                                } ?>><?= $categoria->getCategory() ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group row">
            <input class="form-control" id="imagenProducto" name="imagenProducto" type="file">
        </div>
        <div class="form-group row">
            <input class="btn col-md-12 btn-product" type="submit" value="Guardar"></input>
        </div>
        <div class="from-group row ">
            <input class="btn btn-reset mb-3 col-md-12" type="reset" value="Cancelar"></input>
        </div>
        <div class="from-group row">
            <input class="btn btn-delete col-md-12 form-control" onclick="location.href='productos.php?id=<?= $pID ?>'" type="button" value="Borrar este producto"></input>
        </div>
    </form>
</div>