<?php
require_once("app/controllers/brandController.php");
$brandController = new brandController();

$request = explode("/", $_GET["view"]);
$id = $request[count($request) - 1];

$brand = $brandController->getBrand($id);
$idBrand = "";

if (isset($_POST["recovery"])){
    $idBrand = $id;

    $brandController->recovery($idBrand);
}
?>

<div class="row justify-content-center mt-5">
    <div class="col-12 col-md-8">
        <div class="card bg-dark">
            <div class="card-header border-bottom border-light mt-3">
                <h4><strong>Recuperar Marca</strong></h4>

            </div>
            <div class="card-body text-danger text-center my-3">
                <h3>¿Desea recuperar de la base de datos la marca <?php echo $brand["NOMBRE"] ?>?</h3>
                <form method="POST">
                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" name="recovery" class="btn btn-danger text-light mr-2">
                                <i class="fa-solid fa-trash-arrow-up"></i>
                                Recuperar
                            </button>

                            <a href="<?php echo $APP_URL ?>brands/paperbin" class="btn  btn-warning text-light mr-2">
                                <i class="far fa-window-close"></i>
                                Cancelar
                            </a>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>