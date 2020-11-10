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
                    if(isset($_GET['categoria'])){
                        $productos = $pDAO->obtenerProductoPorCategoria($_GET['categoria']);
                        require_once('partials/categoriaProductos.php');
                    }elseif(isset($_GET['busqueda'])){
                        $productos = $pDAO->obtenerProductosPorNombre($_GET['busqueda']);
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