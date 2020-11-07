<?php
    require_once "../class/UsuarioDAO.php";
    require_once "../class/Usuario.php";

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $login = new UserDAO();

    $user = $login->esUserRegistrado($mail, $password);
    
    if($user != false)
    {
        echo "Usuario Registrado";
    }
    else
    {
        header('Location: ../index.php?error=datosincorrectos&user='.$mail);
    }
