<?php
require_once("app/controllers/productController.php");

$productController= new productController();

$fetchProducts= $productController -> getProducts();

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
    <?php
        foreach($fetchProducts as $product){
    ?>
    
    <div class="col-12 col-md-4 col-lg-3 mt-2">
        <div class="card" style="height: 65vh;">
            <div class="border-bottom" style="height: 60%;">
                <img src="<?php echo $APP_URL . $product["IMAGENPRODUCTO"] ?>" class="card-img-top" alt="imagen" style="width: 100%; height: 100%;">
            </div>
            <div class="card-body p-3" style="height: 40%;">
                <div class="h-75 ">
                    <h5 class="card-text"><?php echo $product["NOMBRE"]?></h5>
                    <p class="card-text"><?php echo "$".$product["PRECIO"]?></p>
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