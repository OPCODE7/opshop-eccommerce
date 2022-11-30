<?php
require_once("app/controllers/brandController.php");
require_once("app/controllers/paginationController.php");
$paginationController = new paginationController();
$size = 4;
$start = 0;
$brandController = new brandController();
$numberPage= 0;

$request = explode("/", $_GET["view"]);
$totalItems = count($request);
if ($totalItems >= 4) {
    $start = $request[$totalItems - 1] * $size - $size;
    $numberPage = $request[count($request) - 1];
}
$pages = $paginationController->paginate("marcas", $size) + 1;
$fetchBrands = $brandController->getBrands($start, $size);


?>


<div class="row">
    <div class="col-12 text-end my-3 px-5">
        <a href="<?php echo $APP_URL ?>proveedores/insertar" class="btn bg-black text-white">
            <span class="fas fa-plus-circle"></span>
            <span class="d-none d-md-inline">Nueva Marca</span>
        </a>
        <a href="<?php echo $APP_URL ?>proveedores/papelera" class="btn bg-black  text-white">
            <span class="fas fa-trash-restore"></span>
            <span class="d-none d-md-inline">Papelera</span>
        </a>
    </div>
</div>


<div class="row mb-3">
    <div class="col-12 col-lg-11 m-auto">
        <div class="card bg-light">
            <h5 class="card-header border-bottom border-light"><strong>Marcas Registradas</strong></h5>
            <div class="card-body">
                <table class="table table-striped table-sm table-bordered" id="marcas">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Registro</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($fetchBrands as $brand) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $brand["ID"]; ?></th>
                                <td><?php echo $brand["NOMBRE"]; ?></td>
                                <td><?php echo $brand["DESCRIPCION"]; ?></td>
                                <td><?php echo $brand["REGISTRO"]; ?></td>

                                <td>
                                    <a href="<?php echo $APP_URL; ?>brands/edit/<?php echo $brand["ID"] ?>" class="btn btn-sm btn-outline-success ">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?php echo $APP_URL; ?>brands/delete/<?php echo $brand["ID"] ?>" class="btn btn-sm btn-outline-danger mt-1 ">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 my-3">
        <nav class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="
                        <?php
                        if ($numberPage > 1 && $numberPage < $pages)
                            echo "{$APP_URL}brands/list/page/" . $numberPage - 1
                        ?>
                    " aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                $startValueLoop= 1;
                $limitValueLoop= $pages-1;

                if($numberPage>=2){
                    $startValueLoop= $numberPage;
                    $setLimit= $numberPage + 1;
                    if($setLimit < $pages){
                        $limitValueLoop= $setLimit;
                        
                    } else{
                        $startValueLoop= $numberPage-1;
                        $limitValueLoop= $numberPage;
                    }
                    
                }

                for ($i = $startValueLoop; $i <= $limitValueLoop; $i++) {
                ?>
                    <li class="page-item"><a href="<?php echo "{$APP_URL}brands/list/page/{$i}" ?>" class="page-link"><?php echo $i ?></a></li>


                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="
                        <?php
                        if ($numberPage < $pages-1)
                            echo "{$APP_URL}brands/list/page/" . $numberPage + 1
                        ?>
                    " aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</div>