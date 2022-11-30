<?php
require_once("app/controllers/userController.php");
require_once("app/controllers/paginationController.php");
$paginationController = new paginationController();
$size = 2;
$start = 0;
$userController = new userController();
$numberPage= 0;

$request = explode("/", $_GET["view"]);
$totalItems = count($request);
if ($totalItems == 4) {
    $start = $request[$totalItems - 1] * $size - $size;
    $numberPage = $request[count($request) - 1];
}
$pages = $paginationController->paginate("usuarios", $size) + 1;

echo $pages;
$fetchUsers = $userController->getUsers($start, $size);


?>


<div class="row">
    <div class="col-12 text-end my-3 px-5">
        <a href="<?php echo $APP_URL ?>proveedores/papelera" class="btn bg-black  text-white">
            <span class="fas fa-trash-restore"></span>
            <span class="d-none d-md-inline">Papelera</span>
        </a>
    </div>
</div>


<div class="row mb-3">
    <div class="col-12 col-lg-11 m-auto">
        <div class="card bg-light">
            <h5 class="card-header border-bottom border-light"><strong>Usuarios Registrados</strong></h5>
            <div class="card-body">
                <table class="table table-striped table-sm table-bordered" id="marcas">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Registro</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($fetchUsers as $user) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $user["ID"]; ?></th>
                                <td><?php echo $user["NOMBRE"]; ?></td>
                                <td><?php echo $user["PWD"]; ?></td>
                                <td><?php echo $user["CORREO"]; ?></td>
                                <td><?php echo $user["ROL"]; ?></td>
                                <td><?php echo $user["REGISTRO"]; ?></td>

                                <td>
                                    <a href="<?php echo $APP_URL; ?>users/edit/<?php echo $user["ID"] ?>" class="btn btn-sm btn-outline-success ">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?php echo $APP_URL; ?>users/delete/<?php echo $user["ID"] ?>" class="btn btn-sm btn-outline-danger mt-1 ">
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
                            echo "{$APP_URL}users/list/page/" . $numberPage - 1
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
                    <li class="page-item"><a href="<?php echo "{$APP_URL}users/list/page/{$i}" ?>" class="page-link"><?php echo $i ?></a></li>


                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="
                        <?php
                        if ($numberPage < $pages-1)
                            echo "{$APP_URL}users/list/page/" . $numberPage + 1
                        ?>
                    " aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</div>