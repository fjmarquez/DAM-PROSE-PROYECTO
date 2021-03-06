<!-- BEGIN CARD -->
<?php
                //ITERAMOS LOS PRODUCTOS DEVUELTOS POR obtenerTodosLosProductos() [ProductoDAO]
                foreach ($productos as $p) {
                ?>
                    <div class="card card-product col-md-3 col-sm-6 col-xs-12">
                        <img class="card-img" src="<?= $p->getImage() ?>" title="<?= $p->getName() . " - "  . $p->getCategory()->getCategory() ?>">
                        <div class=" d-flex justify-content-end">
                            <a href="#" class="card-link text-danger like">
                                <i class="fas fa-heart"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?= $p->getName() ?></h4>
                            <h6 class="card-subtitle mb-2"><?= $p->getCategory()->getCategory() ?></h6>
                            <p class="card-text" title="<?= utf8_encode($p->getLongDescription()) ?>">
                                <?= utf8_encode(substr($p->getLongDescription(), 0, 60)) . "..." ?>
                            </p>
                            <div class="buy d-flex justify-content-between align-items-center">
                                <div class="price text-success">
                                    <h5 class="mt-4"><?= $p->getPrice() ?>€</h5>
                                </div>
                                <a href="detalleProducto.php?id=<?= $p->getId() ?>" class="btn btn-product mt-3">
                                    Ver ficha
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- END CARD -->