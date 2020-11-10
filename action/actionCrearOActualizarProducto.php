<?php

require_once('../class/Producto.php');
require_once('../class/ProductoDAO.php');
require_once('../class/CategoriaDAO.php');
require_once('../class/Categoria.php');

$cDAO = new CategoriaDAO();
$pDAO = new ProductoDAO();

if(isset($_POST['IDProducto'])){
    $pID = $_POST['IDProducto'];
}else {
    $pID = 0;
}

$pNombre = $_POST['nombreProducto'];
$pStock = $_POST['stockProducto'];
$pPrecio = $_POST['precioProducto'];
$pDescripcion = $_POST['descripcionProducto'];

if ($_POST['descuentoProducto'] == 0 || $_POST['descuentoProducto'] == ''){
    $pDescuento = 'NULL';
}else {
    $pDescuento = $_POST['descuentoProducto'];
}

if (isset($_POST['primeProducto']) && $_POST['primeProducto'] == true){
    $pPrime = 1;
}else {
    $pPrime = 0;
}

$pCategoria = $cDAO->recuperarCategoria($_POST['categoriaProducto']);
$pImagen = $_FILES['imagenProducto'];

//echo $pID;
//echo $pNombre;
//echo $pStock;
//echo $pPrime;
//echo $pPrecio;
//echo $pDescuento;
//echo $pDescripcion;
//var_dump($pImagen) ;
//var_dump($pCategoria) ;


//SUBIDA DE IMAGEN
$datetime = new DateTime('now');
$_FILES['imagenProducto']['name'] = date_timestamp_get($datetime). ".jpg";
$dir_subida = "../img/".(str_replace(" ","_",$pCategoria->getCategory()))."/";
$fichero_subido = $dir_subida . basename($_FILES['imagenProducto']['name']);
$existeImagen = false;

if ($_FILES['imagenProducto']['size'] > 0){
    $existeImagen = true;
    if (move_uploaded_file($_FILES['imagenProducto']['tmp_name'], $fichero_subido)) {
        echo "El fichero es válido y se subió con éxito.\n";
    } else {
        echo "¡Posible ataque de subida de ficheros!\n";
    }
}

if ($pID == 0){
    $producto = new Producto($pID, $pNombre, $pStock, $pDescuento,
    $pPrime, $pPrecio, "", $pDescripcion, $dir_subida.$_FILES['imagenProducto']['name'], $pCategoria);
    $pDAO->insertarNuevoProducto($producto);
}else{
    $productoEditado = $pDAO->obtenerProductoPorID($pID);
    if ($existeImagen) {
        $producto = new Producto($pID, $pNombre, $pStock, $pDescuento,
        $pPrime, $pPrecio, "", $pDescripcion, $dir_subida.$_FILES['imagenProducto']['name'], $pCategoria);
    }else {
        $producto = new Producto($pID, $pNombre, $pStock, $pDescuento,
        $pPrime, $pPrecio, "", $pDescripcion, $productoEditado->getImage(), $pCategoria);
    }
    $pDAO->editarProducto($producto);
}

//header('Location: ../pages/detalleProducto.php?id='.$pID);
header('Location: ../pages/productos.php');
