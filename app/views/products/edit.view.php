<?php

require_once("app/controllers/productController.php");
require_once("app/controllers/brandController.php");
require_once("app/controllers/categoryController.php");
require_once("app/controllers/paginationController.php");

$request = explode("/", $_GET["view"]);
$id = $request[count($request) - 1];

$paginationController = new paginationController();
$brandController = new brandController();
$categoryController = new categoryController();
$productController = new productController();

$totalCategories= $paginationController->paginate("categorias",2);
$totalBrands= $paginationController->paginate("marcas",2);

$fetchBrands = $brandController->getBrands(0,$totalBrands + $totalBrands);
$fetchCategories = $categoryController->getCategories(0,$totalCategories + $totalBrands);

$fetchProduct = $productController->getProduct($id);

$idproduct = "";
$name = "";
$description = "";
$price = "";
$image = "";
$brand = "";
$category = "";
$errors = "";
$pathImage = "";

if (isset($_POST["update"])) {
    $idproduct = $id;
    $name = $_POST["nameproduct"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $brand = $_POST["brand"];
    $category = $_POST["categories"];

    if ($_FILES["imagen"]["name"] != null) {
        $image = $_FILES["imagen"];
    } else {
        $image = "";
        $pathImage = "{$fetchProduct["IMAGENPRODUCTO"]}";
    }

    $data = [
        "id" => $idproduct,
        "nameproduct" => $name,
        "description" => $description,
        "price" => $price,
        "image" => $pathImage,
        "brand" => $brand,
        "categories" => $category
    ];

    $errors = $productController->updateProduct($data, $image);
}
?>


<div class="row justify-content-center my-3">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card shadow-lg p-3 rounded ">
            <div class="card-header text-center  border-bottom">
                <h5><strong>Editar Producto</strong></h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="nameproduct" class="form-label">Nombre del producto</label>
                                <input type="text" name="nameproduct" class="form-control" value="<?php echo $fetchProduct["NOMBRE"] ?>" placeholder="Nombre del producto" maxLength="30">
                            </div>
                            <div class="col-6">
                                <label for="price" class="form-label">Precio del producto</label>
                                <input type="text" class="form-control" name="price" placeholder="Precio del producto" value="<?php echo $fetchProduct["PRECIO"] ?>">
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea name="description" cols="30" rows="4" class="form-control" maxLength="200"><?php echo $fetchProduct["DESCRIPCION"] ?></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-group my-2">
                        <div class="row">
                            <div class="col-12">
                                <label for="file" class="form-label">Imagen del producto</label>
                                <img src="<?php echo $APP_URL . $fetchProduct["IMAGENPRODUCTO"] ?>" class="img-fluid my-2 d-block m-auto" alt="imagen del producto" style="width: 50vh; height: 40vh;">
                                <label for="file" class="form-label">Actualizar Imagen</label>
                                <input type="file" class="form-control" name="imagen">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">

                            <div class="col-6">
                                <label for="categories" class="form-label">Categoría del producto</label>
                                <select name="categories" class="form-control">
                                    <option value="<?php echo $fetchProduct["IDCATEGORIA"] ?>"><?php echo $fetchProduct["CATEGORIA"] ?></option>
                                    <?php
                                    foreach ($fetchCategories as $_category) {
                                        if ($_category["ID"] != $fetchProduct["IDCATEGORIA"]) {
                                    ?>

                                            <option value="<?php echo $_category["ID"] ?>"><?php echo $_category["NOMBRE"] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="brand" class="form-label">Marca</label>
                                <select name="brand" class="form-control">
                                    <option value="<?php echo $fetchProduct["IDMARCA"] ?>"><?php echo $fetchProduct["MARCA"] ?></option>
                                    <?php
                                    foreach ($fetchBrands as $brand) {
                                        if ($brand["ID"] != $fetchProduct["IDMARCA"]) {
                                    ?>
                                            <option value="<?php echo $brand["ID"] ?>"><?php echo $brand["NOMBRE"] ?></option>
                                    <?php
                                        }
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
                        <button type="submit" name="update" class="btn btn-primary mr-2">
                            <i class="fas fa-save"></i>
                            Actualizar
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