<?php
    require_once "UsuarioDAO.php";

    $login = new UsuarioDAO();

    //$login->recuperarUsuario(1);

    echo $login->esUsuarioRegistrado("Manuel", "prueba");
