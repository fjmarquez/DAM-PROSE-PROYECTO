<?php

require_once('../class/ProductoDAO.php');
require_once('../class/Producto.php');

$pDAO = new ProductoDAO();
$pID = $_GET['id'];

$pDAO->eliminarProducto($pID);

header('Location: ../index.php');