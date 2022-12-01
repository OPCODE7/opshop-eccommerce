<?php
    require_once("app/controllers/productController.php");
    $productController= new productController();
    $fetchDelProducts= $productController -> getProductsDel();

?>


<div class="row px-3">
    <?php
    foreach ($fetchDelProducts as $product) {
    ?>

        <div class="col-12 col-md-4 col-lg-3 mt-2">
            <div class="card mb-2" style="height: 65vh;">
                <div class="border-bottom" style="height: 60%;">
                    <a href="<?php echo "{$APP_URL}products/lookProduct/{$product["ID"]}" ?>" class="text-decoration-none">
                        <img src="<?php echo $APP_URL . $product["IMAGENPRODUCTO"] ?>" class="card-img-top" alt="imagen" style="width: 100%; height: 100%;">
                    </a>
                </div>
                <div class="card-body p-3" style="height: 40%;">
                    <div class="h-75 ">
                        <h5 class="card-text"><?php echo $product["NOMBRE"] ?></h5>
                        <p class="card-text"><?php echo "$" . $product["PRECIO"] ?></p>
                    </div>
                    <div class="d-flex justify-content-center h-25 ">
                        <?php
                        if ($role == "ADMIN" || $role === "SUPER") {
                        ?>
                            <a href="<?php echo "{$APP_URL}products/recovery/{$product["ID"]}" ?>" class="btn btn-success text-white mx-1">Recuperar</a>
                            <a href="<?php echo "{$APP_URL}products/destroy/{$product["ID"]}" ?>" class="btn btn-danger text-white">Eliminar</a>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>