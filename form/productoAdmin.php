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
    <img class="card-img" src="<?= $producto->getImage() ?>"
         title="<?= $producto->getName() . " - " . $producto->getCategory()->getCategory() ?>">
</div>

<form class="col-md-7">
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
        <input id="primeProducto" name="Prime" type="checkbox"
            <?php
                if($producto->getPrime() == 1)
                {
                    echo "checked";
                }
            ?>>
    </div>
    <div class="form-group row">
        <select id="categoriaProducto" name="categoriaProducto" class="form-control">
            <option disabled>Categoría</option>
            <?php
                foreach ($categorias as $categoria)
                {
                    ?>
                        <option <?php if($categoria->getID() == $producto->getCategory()->getID()){echo "selected";}?> ><?= $categoria->getCategory() ?></option>
                    <?php
                }
            ?>
        </select>
    </div>
    <div class="form-group row">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-dark" type="reset">Cancelar</button>
    </div>
</form>


