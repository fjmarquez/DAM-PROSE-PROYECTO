<?php
require_once ("ValoracionDAO.php");

$vDAO = new ValoracionDAO();

$valoracion = $vDAO->obtenerValoracionesPorIDProducto(1);