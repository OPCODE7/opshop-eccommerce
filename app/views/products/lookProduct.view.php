<?php

require_once("app/controllers/productController.php");
require_once("app/controllers/brandController.php");
require_once("app/controllers/categoryController.php");

$request = explode("/", $_GET["view"]);
$id = $request[count($request) - 1];

$brandController = new brandController();
$categoryController = new categoryController();
$productController = new productController();

$fetchBrands = $brandController->getBrands();
$fetchCategories = $categoryController->getCategories();

$fetchProduct = $productController->getProduct($id);
?>

<div class="row  m-auto w-75 my-3 p-0 " style="min-height: 75vh;">
    <div class="col-6">
        <img src="<?php echo "{$APP_URL}{$fetchProduct["IMAGENPRODUCTO"]}"?>" alt="imagen-producto" class="img-fluid w-100 h-100">
    </div>
    <div class="col-6 d-flex flex-column justify-content-center">
        <h1 class="fw-bold text-spacing-0"><?php echo $fetchProduct["NOMBRE"]?></h1>
        <p class="fs-2 text-secondary fw-lighter">$<?php echo $fetchProduct["PRECIO"]?></p>
        <p class="fw-lighter text-secondary"><?php echo $fetchProduct["DESCRIPCION"]?>.</p>
        <div class="my-3">
            <input type="number" value="1" class= "px-2 py-2 text-center" style="width: 15vh;">
            <a href="#" class="text-dark btn-yellow fw-bold">Añadir al carrito</a>
        </div>
        <span class="d-block fw-light">MARCA: <a href="" class="text-decoration-none text-warning"><?php echo $fetchProduct["MARCA"]?></a></span>
        <span class="d-block fw-light">CATEGORIA: <a href="#" class="text-decoration-none text-warning"><?php echo $fetchProduct["CATEGORIA"]?></a></span>

    </div>
</div>
