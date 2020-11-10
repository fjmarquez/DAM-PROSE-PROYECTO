<?php
require_once('../class/ProductoDAO.php');
require_once('../class/CategoriaDAO.php');
//$pID = $_GET['id'];
//echo $pID;
//$pDAO = new ProductoDAO();
//$producto = $pDAO->obtenerProductoPorID($pID);
$cDAO = new CategoriaDAO();
$categorias = $cDAO->obtenerTodasLasCategorias();
//var_dump($producto);
?>

    <form action="../action/actionCrearOActualizarProducto.php" method="POST" class="col-md-12 mt-5" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-md-4" for="nombreProducto">Nombre: </label>
            <input required id="nombreProducto" name="nombreProducto" class="form-control col-md-8" type="text" maxlength="100">
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="stockProducto">Stock: </label>
            <input required id="stockProducto" name="stockProducto" class="form-control col-md-8" type="number" min="0" max="99999999999">
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="precioProducto">Precio: </label>
            <input id="precioProducto" name="precioProducto" class="form-control col-md-7" type="number" step=".01" min="1">
            <div class="input-group-prepend col-md-1 text-center">
                <p class="input-group-text col-md-12" id="basic-addon1">Euros</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="descuentoProducto">Descuento: </label>
            <input required id="descuentoProducto" name="descuentoProducto" class="form-control col-md-8" type="number" step=".1" min="0" max="1">
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="descripcionProducto">Descripción: </label>
            <textarea required id="descripcionProducto" name="descripcionProducto" class="form-control col-md-8" type="text" maxlength="900"></textarea>
        </div>
        <div class="form-group row">
            <label class="col-md-4" for="primeProducto">Prime: </label>
            <input  id="primeProducto" value="1" name="primeProducto" type="checkbox">
        </div>
        <div class="form-group row">
            <select required id="categoriaProducto" name="categoriaProducto" class="form-control">
                <option disabled selected>Categoría</option>
                <?php
                foreach ($categorias as $categoria) {
                ?>
                    <option value="<?= $categoria->getID() ?>"><?= $categoria->getCategory() ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group row">
            <input  class="form-control" id="imagenProducto" name="imagenProducto" type="file">
        </div>
        <div class="form-group row">
            <input type="submit" class="btn btn-product col-md-12" name="btnSubmitNuevoProducto" value="Crear"></input>
        </div>
        <div class="form-group row">
            <input type="submit" class="btn btn-reset col-md-12" name="btnResetNuevo" value="Cancelar"></input>
        </div>
    </form>
