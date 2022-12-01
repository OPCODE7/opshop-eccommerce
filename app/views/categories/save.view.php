<?php
    require_once("app/controllers/categoryController.php");
    $categoryController= new categoryController();
    $errors= "";
    $nameCategory= "";
    if(isset($_POST["save"])){
        $nameCategory= $_POST["namecategory"];

        $data= [
            "namecategory" => $nameCategory
        ];

        $errors= $categoryController -> saveCategory($data); 
    }

?>


<div class="row justify-content-center mt-5">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card shadow-lg p-3 rounded ">
            <div class="card-header text-center  border-bottom">
                <h5><strong>Nueva Categoría</strong></h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="namecategory" class="form-label">Nombre de la categoría
                                </label>
                                <input type="text" name="namecategory" class="form-control" value="<?php echo $nameCategory ?>" placeholder="Nombre de la categoría" maxLength="30">
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
                        <a href="<?php echo $APP_URL; ?>categories/list" class="btn btn-warning text-light">
                            <i class="fas fa-times-circle"></i>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>