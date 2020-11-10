<?php

require_once('../class/ValoracionDAO.php');
require_once('../class/UsuarioDAO.php');
require_once('../class/ProductoDAO.php');

$vDAO = new ValoracionDAO();

$valoraciones = $vDAO->obtenerValoracionesPorIDProducto($pID);

?>

<!-- FORMULARIO DE VALORACIONES -->
<div class=" col-md-12 jumbotron mt-4">
    <h3 class="display-5 col-md-12">Reseñas</h3>
    <hr class="my-4">
    <form class="col-md-12" method="POST" action="../action/actionValoracion.php?product=<?= $pID ?>&user=<?= $_SESSION['ID'] ?>">
        <div class="form-group row">
            <label for="textoResena" class="col-md-4">Valoracion: </label>
            <div class="clasificacion">
                <input id="radio1" class="oculto" type="radio" name="estrellas" value="5" required >
                <label for="radio1" class="estrella">★</label>
                <input id="radio2" class="oculto" type="radio" name="estrellas" value="4" >
                <label for="radio2" class="estrella">★</label>
                <input id="radio3" class="oculto" type="radio" name="estrellas" value="3" >
                <label for="radio3" class="estrella">★</label>
                <input id="radio4" class="oculto" type="radio" name="estrellas" value="2" >
                <label for="radio4" class="estrella">★</label>
                <input id="radio5" class="oculto" type="radio" name="estrellas" value="1" >
                <label for="radio5" class="estrella">★</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="textoValoracion" class="col-md-4">Reseña: </label>
            <textarea class="col-md-8 form-control" name="textoValoracion" id="textoValoracion" maxlength="900" required></textarea>
        </div>
        <div class="form-group row">
            <input type="submit" name="btnValoracion" class="btn btn-product btn-valoracion form-control offset-md-9 col-md-3">
        </div>
    </form>
</div>
<!-- LISTADO DE VALORACIONES -->
<?php
foreach ($valoraciones as $v) {
?>
    <div class=" col-md-12 jumbotron mt-4">
        <h3 class="display-5 col-md-12"><?= $v->getUser()->getName() . " (" . $v->getUser()->getMail() . ")" ?></h3>
        <hr class="my-4">
        <div class="col-md-12">
            <div class="form-group row">
                <label for="textoResena" class="col-md-4">Valoracion: </label>
                <div class="resenaUsuarios">
                    <label class="estrellaMarcada">
                        <?php

                        for ($i = 1; $i <= $v->getRating(); $i++) {
                        ?>
                            ★
                        <?php

                        }
                        ?>


                    </label>
                </div>
            </div>
            <div class="form-group row">
                <label for="textoValoracion" class="col-md-4">Reseña: </label>
                <textarea disabled class="col-md-8 form-control" name="textoValoracion" id="textoValoracion" maxlength="900"><?= $v->getReview() ?></textarea>
            </div>
        </div>

    </div>
<?php
}
?>