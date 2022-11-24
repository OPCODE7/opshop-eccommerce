<?php
    $name= "";
    $description= "";
    $image= "";
    $brand= "";
    $category= "";
    $errors= "";
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
                                <label for="id">Nombre del producto</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Nombre del producto" maxLength="100">
                            </div>
                            <div class="col-6">
                                <label for="categoria">Marca</label>
                                <input type="text" name="brand" placeholder="Escribir la marca" class="form-control" maxLength="200" value="<?php echo $brand ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="direccion">Descripción</label>
                                <textarea name="direccion" cols="30" rows="4" class="form-control" maxLength="200"><?php echo $description ?></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="imagen">Imagen del producto</label>
                                <input type="file" class="form-control" name="imagen">
                            </div>
                            <div class="col-6">
                                <label for="categories">Categoría del producto</label>
                                <select name="categories" class="form-control">
                                    <option value="">Seleccionar Categoría</option>
                                    <option value="pc">PC</option>
                                    <option value="desktop">Computadoras de escritorio</option>
                                    <option value="mouse">Mouse</option>
                                    <option value="keyboard">Teclado</option>
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
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    <?php

                    }
                    ?>

                    <div class="form-group  text-center mt-4">
                        <button type="submit" name="guardar" class="btn btn-primary mr-2">
                            <i class="fas fa-save"></i>
                            Guardar
                        </button>
                        <a href="<?php echo $APP_URL;?>products/list" class="btn btn-warning text-light">
                            <i class="fas fa-times-circle"></i>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>