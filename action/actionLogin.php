<?php
    require_once "../class/UsuarioDAO.php";
    require_once "../class/Usuario.php";

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $login = new UserDAO();

    $user = $login->esUserRegistrado($mail, $password);
    
    if($user != false)
    {
        //echo "Usuario Registrado";

        session_start();

        $_SESSION['ID'] = $user->getID();
        $_SESSION['name'] = $user->getName();
        $_SESSION['mail'] = $user->getMail();
        $_SESSION['admin'] = $user->getAdmin();

        header('Location: ../pages/productos.php');
    }
    else
    {
        header('Location: ../index.php?error=datosincorrectos&user='.$mail);
    }
