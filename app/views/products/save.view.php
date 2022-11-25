<?php

require_once("app/controllers/productController.php");
require_once("app/controllers/brandController.php");
require_once("app/controllers/categoryController.php");

$brandController = new brandController();
$categoryController = new categoryController();

$fetchBrands = $brandController->getBrands();
$fetchCategories = $categoryController->getCategories();


$productController = new productController();
$name = "";
$description = "";
$price = "";
$image = "";
$brand = "";
$category = "";
$errors = "";

if (isset($_POST["save"])) {
    $name = $_POST["nameproduct"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $brand = $_POST["brand"];
    $category = $_POST["categories"];

    if (isset($_FILES["file"])) {
        $image = $_FILES["file"];
    } else {
        $image = "";
    }

    $data = [
        "nameproduct" => $name,
        "description" => $description,
        "price" => $price,
        "brand" => $brand,
        "categories" => $category
    ];

    $errors = $productController->saveProduct($data, $image);
}
?>


<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card shadow-lg p-3 rounded ">
            <div class="card-header text-center  border-bottom">
                <h5><strong>Nuevo Producto</strong></h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="nameproduct" class="form-label">Nombre del producto</label>
                                <input type="text" name="nameproduct" class="form-control" value="<?php echo $name ?>" placeholder="Nombre del producto" maxLength="20">
                            </div>
                            <div class="col-6">
                                <label for="brand" class="form-label">Marca</label>
                                <select name="brand" class="form-control">
                                    <option value="">Seleccionar Marca</option>
                                    <?php
                                    foreach ($fetchBrands as $brand) {
                                    ?>
                                        <option value="<?php echo $brand["ID"] ?>"><?php echo $brand["NOMBRE"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea name="description" cols="30" rows="4" class="form-control" maxLength="200"><?php echo $description ?></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="file" class="form-label">Imagen del producto</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="price" class="form-label">Precio del producto</label>
                                <input type="text" class="form-control" name="price" placeholder="Precio del producto" value="<?php echo $price ?>">
                            </div>
                            <div class="col-6">
                                <label for="categories" class="form-label">Categoría del producto</label>
                                <select name="categories" class="form-control">
                                    <option value="">Seleccionar Categoría</option>
                                    <?php
                                    foreach ($fetchCategories as $_category) {
                                    ?>
                                        <option value="<?php echo $_category["ID"] ?>"><?php echo $_category["NOMBRE"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                    </div>

                    <?php
                    if ($errors != "") {

                    ?>
                        <div class="row my-2">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?php echo $errors ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="form-group  text-center mt-4">
                        <button type="submit" name="save" class="btn btn-primary mr-2">
                            <i class="fas fa-save"></i>
                            Guardar
                        </button>
                        <a href="<?php echo $APP_URL; ?>products/list" class="btn btn-warning text-light">
                            <i class="fas fa-times-circle"></i>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>