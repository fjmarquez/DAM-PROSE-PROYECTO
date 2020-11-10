<?php 
  session_start();
  if(isset($_SESSION['name']) != null) {
    header('Location: pages/productos.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
            <meta charset="UTF-8">
            <title>Login</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" href="styles/style.css">
            <script
                src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                    crossorigin="anonymous">
            </script>
    </head>
    <body class="body-login">
        <div class="container-fluid">
            <div class="row">
                <div class="jumbotron margintop col-md-4 col-md-offset-4">
                    
                    <form action="action/actionLogin.php" method="post">
                        <div class=" center">
                            <img class="img-responsive center-block logo" src="img/logo.png" alt="logo">
                        </div>
                        <div class="form-group">
                            <input required class="form-control" type="email" placeholder="Usuario" name="mail"
                            <?php
                            if(isset($_GET['user'])){
                                echo 'value="'.$_GET['user'].'"';
                            };
                            ?>
                            >
                        </div>

                        <div class="form-group">
                            <input required  class="form-control" type="password" placeholder="Contraseña" name="password">
                        </div>

                        <div class="text-center flex ">
                            <button class="btn btn-login" type="submit">Sign in</button>
                        </div>

                        <?php
                        
                        if(isset($_GET['error'])){
                            echo '<p class="datosIncorrectos">Datos incorrectos</p>';
                        }
                        
                        ?>
                        
                    </form>
                </div>
            </div>
            </div>
        </div>
    </body>

</html>