<?php
    require_once "UsuarioDAO.php";

    $login = new UsuarioDAO();

    $user = $login->esUsuarioRegistrado("Manuel", "prueba");
