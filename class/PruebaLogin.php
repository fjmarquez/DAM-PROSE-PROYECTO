<?php
    require_once "UsuarioDAO.php";

    $login = new UserDAO();

    $user = $login->esUserRegistrado("manuel.caballero@iesnervion.es", "prueba");

    if($user != false)
    {
        echo "Usuario Registrado";
    }
    else
    {
        echo "Usuario no registrado";
    }
