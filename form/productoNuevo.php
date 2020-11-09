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
<div class="col-md-12">
    <form action="../action/actionProducto.php" method="POST" class="col-md-12" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-md-4" for="nombreProducto">Nombre: </label>
            <input id="nombreProducto" name="nombreProducto" class="form-control col-md-8" type="text" maxlength="100">
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="stockProducto">Stock: </label>
            <input id="stockProducto" name="stockProducto" class="form-control col-md-8" type="number" min="0" max="99999999999">
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="precioProducto">Precio: </label>
            <input id="precioProducto" name="precioProducto" class="form-control col-md-7" type="number" step=".01" min="1">
            <div class="input-group-prepend col-md-1">
                <span class="input-group-text" id="basic-addon1">€</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="descuentoProducto">Descuento: </label>
            <input id="descuentoProducto" name="descuentoProducto" class="form-control col-md-8" type="number" step=".1" min="0" max="1">
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="descripcionProducto">Descripción: </label>
            <input id="descripcionProducto" name="descripcionProducto" class="form-control col-md-8" type="text" maxlength="900">
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="primeProducto">Prime: </label>
            <input id="primeProducto" name="Prime" type="checkbox">
        </div>
        <div class="form-group row">
            <select id="categoriaProducto" name="categoriaProducto" class="form-control">
                <option disabled selected>Categoría</option>
                <?php
                foreach ($categorias as $categoria) {
                ?>
                    <option><?= $categoria->getCategory() ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group row">
            <input class="form-control" id="imagenProducto" name="imagenProducto" type="file">
        </div>
        <div class="form-group">
            <input type="submit" name="btnSubmitNuevoProducto">Crear nuevo producto</div>
        </div>
    </form>
</div>