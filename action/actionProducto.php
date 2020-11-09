<?php

require_once('../class/producto.php');
require_once('../class/productoDAO.php');

if(isset($_POST['IDProducto'])){
    $pID = $_POST['IDProducto'];
}else {
    $pID = 0;
}
$pNombre = $_POST['nombreProducto'];
$pStock = $_POST['stockProducto'];
$pPrecio = $_POST['precioProducto'];
$pDescuento = $_POST['descuentoProducto'];
$pDescripcion = $_POST['descripcionProducto'];
$pPrime = $_POST['primeProducto'];
$pCategoria = $_POST['categoriaProducto'];
$pImagen = $_FILES['imagenProducto'];

$pDAO = new ProductoDAO();

$pImagenRuta = "../img/".(str_replace(" ","_",$pCategoria->getCategory()))."/.". ."jpg";

$datetime = new DateTime('now');

$producto = new Producto($pID, $pNombre, $pStock, $pDescuento,
$pPrime, $pPrecio, "", $pDescripcion, $pImagenRuta, $pCategoria);