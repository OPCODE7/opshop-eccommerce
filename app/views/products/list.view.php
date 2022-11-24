<?php
require_once("app/controllers/productController.php");

?>

<?php
if ($role == "ADMIN" || $role === "SUPER") {
?>
    <div class="row">
        <div class="col-12 text-end">
            <a href="<?php echo $APP_URL;?>products/save" class="btn btn-success text-white">
                <i class="fa-solid fa-square-plus"></i>
                Añadir Producto
            </a>
        </div>
    </div>
<?php
}

?>

<div class="row px-4">
    <div class="col-12 col-md-4 col-lg-3">
        <div class="card" style="height: 60vh;">
            <div class="border-bottom" style="height: 60%;">
                <img src="<?php echo $APP_URL . "app/storage/img_app/op-logo.jpg" ?>" class="card-img-top" alt="imagen" style="width: 100%; height: 100%;">
            </div>
            <div class="card-body p-3" style="height: 40%;">
                <h5 class="card-text">Nombre del producto</h5>
                <p class="card-text">Precio del producto</p>
                <div class="d-flex justify-content-center">
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
</div>