<?php
require_once("app/controllers/productController.php");

$productController = new productController();

$fetchProducts = $productController->getProducts();

?>

<div class="row bg-dark w-100 m-0 p-0">
    <div class="col-12 p-0 w-100">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true" style="height: 60vh;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner w-100 h-100">
                <div class="carousel-item active w-100 h-100">
                    <img src="<?php echo $APP_URL ?>/app/storage/img_app/descuentos-banner.png" class="d-block w-100 h-100 img-fluid" alt="Descuentos slide">
                </div>
                <div class="carousel-item w-100 h-100">
                    <img src="<?php echo $APP_URL ?>/app/storage/img_app/serviciodomicilio-banner.png" class="d-block w-100 h-100 img-fluid" alt="Servicio a domicilio slide">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<?php
if ($role == "ADMIN" || $role === "SUPER") {
?>
    <div class="row my-3 px-4">
        <div class="col-12 text-end">
            <a href="<?php echo $APP_URL; ?>products/save" class="btn btn-success text-white">
                <i class="fa-solid fa-square-plus"></i>
                Añadir Producto
            </a>
        </div>
    </div>
<?php
}

?>

<div class="row px-4">
    <?php
    foreach ($fetchProducts as $product) {
    ?>

        <div class="col-12 col-md-4 col-lg-3 mt-2">
            <div class="card" style="height: 65vh;">
                <div class="border-bottom" style="height: 60%;">
                    <img src="<?php echo $APP_URL . $product["IMAGENPRODUCTO"] ?>" class="card-img-top" alt="imagen" style="width: 100%; height: 100%;">
                </div>
                <div class="card-body p-3" style="height: 40%;">
                    <div class="h-75 ">
                        <h5 class="card-text"><?php echo $product["NOMBRE"] ?></h5>
                        <p class="card-text"><?php echo "$" . $product["PRECIO"] ?></p>
                    </div>
                    <div class="d-flex justify-content-center h-25 ">
                        <a href="" class="btn btn-primary text-white">Ver más</a>

                        <?php
                        if ($role == "ADMIN" || $role === "SUPER") {
                        ?>
                            <a href="#" class="btn btn-primary text-white mx-1">Editar</a>
                            <a href="#" class="btn btn-danger text-white">Eliminar</a>
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