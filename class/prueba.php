<?php
require_once ("ValoracionDAO.php");

$vDAO = new ValoracionDAO();

$vDAO->obtenerValoracionesPorIDProducto(1);