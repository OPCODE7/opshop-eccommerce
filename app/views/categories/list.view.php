<?php
require_once("app/controllers/categoryController.php");
require_once("app/controllers/paginationController.php");
$paginationController = new paginationController();
$size = 1;
$start = 0;
$categoryController = new categoryController();
$numberPage = 0;

$request = explode("/", $_GET["view"]);
$totalItems = count($request);
if ($totalItems > 3) {
    $start = $request[$totalItems - 1] * $size - $size;
    $numberPage = $request[count($request) - 1];
}
$pages = $paginationController->paginate("categorias", $size) + 1;
$fetchCategories = $categoryController->getCategories($start, $size);


?>


<div class="row">
    <div class="col-12 text-end my-3 px-5">
        <a href="<?php echo $APP_URL ?>categories/save" class="btn bg-black text-white">
            <span class="fas fa-plus-circle"></span>
            <span class="d-none d-md-inline">Nueva Categoría</span>
        </a>
        <a href="<?php echo $APP_URL ?>categories/paperbin" class="btn bg-black  text-white">
            <span class="fas fa-trash-restore"></span>
            <span class="d-none d-md-inline">Papelera</span>
        </a>
    </div>
</div>


<div class="row mb-3">
    <div class="col-12 col-lg-11 m-auto">
        <div class="card bg-light">
            <h5 class="card-header border-bottom border-light"><strong>Categorías Registradas</strong></h5>
            <div class="card-body">
                <table class="table table-striped table-sm table-bordered" id="categorias">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Registro</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($fetchCategories as $category) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $category["ID"]; ?></th>
                                <td><?php echo $category["NOMBRE"]; ?></td>
                                <td><?php echo $category["REGISTRO"]; ?></td>

                                <td>
                                    <a href="<?php echo $APP_URL; ?>categories/edit/<?php echo $category["ID"] ?>" class="btn btn-sm btn-outline-success ">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?php echo $APP_URL; ?>categories/delete/<?php echo $category["ID"] ?>" class="btn btn-sm btn-outline-danger mt-1 ">
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
                            echo "{$APP_URL}categories/list/page/" . $numberPage - 1
                        ?>
                    ">Previous</a>
                </li>
                <?php
                $startValueLoop = 1;
                $pages <= 6 ? $limitValueLoop = $pages : $limitValueLoop = 6;

                if ($numberPage > 6) {
                    $startValueLoop = $numberPage - 5;
                    $setLimit = $numberPage + 1;
                    if ($setLimit < $pages) {
                        $limitValueLoop = $setLimit;
                    } else {
                        $startValueLoop = $numberPage - 5;
                        $limitValueLoop = $numberPage;
                    }
                }

                for ($i = $startValueLoop; $i <= $limitValueLoop; $i++) {
                ?>
                    <li class="page-item"><a href="<?php echo "{$APP_URL}categories/list/page/{$i}" ?>" class="page-link"><?php echo $i ?></a></li>

                <?php
                }
                ?>

                <li class="page-item">
                    <a class="page-link" href="
                    <?php
                    if ($numberPage < $pages - 1)
                        echo "{$APP_URL}categories/list/page/" . $numberPage + 1
                    ?>
                    ">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>