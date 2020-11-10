<?php

require_once('../class/UsuarioDAO.php');
require_once('../class/ProductoDAO.php');
require_once('../class/ValoracionDAO.php');

$uDAO = new UserDAO();
$pDAO = new ProductoDAO();
$vDAO = new ValoracionDAO();

if ($_POST['estrellas'] == 0){
    $rating = 1;
}else {
    $rating = $_POST['estrellas'];
}

$review = $_POST['textoValoracion'];

$idProduct = $_GET["product"];

$idUser = $_GET["user"];

$user = $uDAO->recuperarUser($idUser);

$product = $pDAO->obtenerProductoPorID($idProduct);

$valoracion = new Valoracion($rating, $review, $user, $product);

$vDAO->insertarNuevaValoracion($valoracion);

header('Location: ../pages/detalleProducto.php?id='.$idProduct);


//echo $rating . " " . $review;