<?php

require_once("app/controllers/brandController.php");

$request = explode("/", $_GET["view"]);
$id = $request[count($request) - 1];

$brandController = new brandController();


$fetchBrand = $brandController->getBrand($id);

$idBrand = "";
$name = "";
$description = "";
$image = "";
$errors = "";
$pathImage = "";

if (isset($_POST["update"])) {
    $idBrand = $id;
    $name = $_POST["namebrand"];
    $description = $_POST["description"];

    if ($_FILES["imagen"]["name"] != null) {
        $image = $_FILES["imagen"];
    } else {
        $image = "";
        $pathImage = "{$fetchBrand["AVATAR"]}";
    }

    $data = [
        "id" => $idBrand,
        "namebrand" => $name,
        "description" => $description,
        "image" => $pathImage,
    ];

    $errors = $brandController->updateBrand($data, $image);
}
?>


<div class="row justify-content-center my-3">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card shadow-lg p-3 rounded ">
            <div class="card-header text-center  border-bottom">
                <h5><strong>Editar Marca</strong></h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="namebrand" class="form-label">Nombre de la marca</label>
                                <input type="text" name="namebrand" class="form-control" value="<?php echo $fetchBrand["NOMBRE"] ?>" placeholder="Nombre de la marca" maxLength="30">
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea name="description" cols="30" rows="4" class="form-control" maxLength="200"><?php echo $fetchBrand["DESCRIPCION"] ?></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-group my-2">
                        <div class="row">
                            <div class="col-12">
                                <label for="file" class="form-label">Imagen de la marca</label>
                                <img src="<?php echo $APP_URL . $fetchBrand["AVATAR"] ?>" class="img-fluid my-2 d-block m-auto" alt="imagen de la marca" style="width: 50vh; height: 40vh;">
                                <label for="file" class="form-label">Actualizar Imagen</label>
                                <input type="file" class="form-control" name="imagen">
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
                        <a href="<?php echo $APP_URL; ?>brands/list" class="btn btn-warning text-light">
                            <i class="fas fa-times-circle"></i>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>