<?php
    require_once ("app/controllers/brandController.php");
    $brandController= new brandController();

    $request= explode("/", $_GET["view"]);
    $id= $request[count($request) -1];

    $brand= $brandController->getBrand($id);
    $idproduct="";

    if(isset($_POST["delete"])){
        $idproduct= $id;

        $brandController -> logicDelete($idproduct);
    }
    
?>


<div class="row justify-content-center mt-5">
    <div class="col-12 col-md-8">
    <div class="card bg-dark">
        <div class="card-header border-bottom border-light mt-3">
        <h4><strong>Eliminar Marca</strong></h4>
            
        </div>
        <div class="card-body text-danger text-center my-3">
            <h3>¿Desea Eliminar de la base de datos la marca <?php echo $brand["NOMBRE"]?>?</h3>
            <form method="POST">
            <div class="row mt-4">
                <div class="col-12">
                    <button type="submit" name="delete" class="btn btn-danger text-light mr-2">
                    <i class="fas fa-trash-restore"></i>
                        Eliminar
                    </button>
            
                    <a href="<?php echo $APP_URL?>brands/list" class="btn  btn-warning text-light mr-2">
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