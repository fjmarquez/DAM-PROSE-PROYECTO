<!DOCTYPE html>
<html lang="es">
<?php
    require_once('partials/head.php');
    require_once('../class/ProductoDAO.php');
    $pDAO = new ProductoDAO();
    
?>
    <body>
        <?php require_once('partials/navbar.php');?>
        <div class="container-fluid">
            <div class="row">
                <?php 

                    if(isset($_POST['busqueda'])){
                        $productos = $pDAO->obtenerProductosPorNombre($_POST['busqueda']);
                        require_once('partials/busquedaProductos.php');
                    }else {
                        $productos = $pDAO->obtenerTodosLosProductos();
                        require_once('partials/todosProductos.php');
                    }
                    
                ?>
            </div>
        </div>
    </body>

</html>