<?php
require_once("app/config/routes.php");
$route = new Routes();

$userData =  $_SESSION["userlogged"];
$role = $userData["role"];
$img = $userData["img"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $APP_URL . "public/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo $APP_URL . "public/css/style.css" ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="shortcut icon" href="<?php echo $APP_URL . "app/storage/img_app/opcode.ico" ?>" type="image/x-icon">
    <title>OpShop</title>
</head>

<body>
    <div class="container-fluid p-0 d-flex flex-wrap min-vh-100">
        <header class="w-100 h-25 position-sticky top-0" style="z-index: 5;">
            <nav class="navbar navbar-expand-lg bg-black w-100 d-flex justify-content-between d-flex align-items-center px-3">
                <div class="d-flex flex-row align-items-center w-50">
                    <a class="navbar-brand" href="<?php echo $APP_URL ?>">
                        <img src="<?php echo $APP_URL . "app/storage/img_app/op-logo-white.jpg" ?>" alt="OPLOGO">
                    </a>

                    <div class="nav-expand" style="z-index: 4;" id="nav">
                        <span class="fas fa-close text-white fs-3"></span>
                        <ul class="navbar-nav d-flex">
                            <li class="nav-item">
                                <a class="nav-link " href="<?php echo $APP_URL ?>">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">MARCAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">CONTACTO</a>
                            </li>
                            <?php
                            if ($role == "ADMIN" || $role == "SUPER") {
                            ?>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $APP_URL ?>administration">ADMINISTRACIÓN</a>
                                </li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        ADMINISTRACIÓN
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="<?php echo $APP_URL ?>brands/list">
                                                <i class="fa-solid fa-tag"></i>
                                                <span class="mx-2">Marcas</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-bars-progress"></i>
                                                <span class="mx-2">Categorias</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo $APP_URL ?>products/list">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span class="mx-2">Productos</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo $APP_URL ?>products/list">
                                                <i class="fa-solid fa-user"></i>
                                                <span class="mx-2">Usuarios</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <i class="fa-solid fa-bars text-white"></i>

                <div>
                    <ul class="navbar-nav w-100 d-flex flex-row justify-content-end d-flex align-items-center">

                        <li class="nav-item">
                            <a class="nav-link fa-solid fa-heart position-relative" href="#">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-white p-1" style="width: 1.2rem; height: 1.2rem;"><span class="text-dark">0</span></span>
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link fa-solid fa-cart-shopping position-relative" href="#">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-white p-1" style="width: 1.2rem; height: 1.2rem;"><span class="text-dark">0</span></span>
                            </a>
                        </li>
                        <li class="nav-item position-relative">
                            <img class="img-fluid rounded-circle img-user border border-2 border-white" src="<?php echo $APP_URL . $img ?>" style="width: 40px; height: 40px;cursor: pointer;"></img>
                            <i class="fa-solid fa-angle-down text-white  "></i>
                            <div class="card position-absolute end-50 top-100 user-info h-auto shadow-lg bg-body rounded d-none user-info">
                                <div class="card-header">
                                    <h5 class="text-dark">Área Personal</h5>
                                </div>
                                <div class="card-body d-flex align-items-center">
                                    <img src="<?php echo $APP_URL . $img ?>" alt="user-image" style="width: 65px; height: 65px;" class="rounded-circle">
                                    <div class="mx-3">
                                        <h5 class="text-dark"><b><?php echo $userData["username"] ?></b></h5>
                                        <a href="#" class="btn btn-success text-white py-1">Editar perfil</a>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <a href="<?php echo $APP_URL ?>users/logout" class="text-decoration-none text-dark">
                                        <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>
        <main class="row w-100 m-0 mb-2" style="min-height: 75vh;">

            <div class="col-12 p-0">
                <!-- Aqui van a ir las vistas -->

                <?php
                if (isset($_GET["view"])) {

                    include $route->Request($_GET["view"]);
                } else {
                    include $route->Request($APP_URL . "products/list");
                }

                ?>
            </div>
        </main>
        <footer class="bg-black text-center align-self-end w-100 py-4">
            <small class="text-white">Desarrollado por @OpCode 2022</small>
        </footer>
    </div>
    <script src="<?php echo $APP_URL . "public/js/bootstrap.bundle.min.js" ?>"></script>
    <script>
        const d = document;

        const $menu = d.querySelector("#nav");


        d.addEventListener("click", e => {
            if (e.target.matches(".fa-bars"))
                $menu.classList.add("nav-collapse");


            if (e.target.matches(".fa-close"))
                $menu.classList.remove("nav-collapse");

            if (e.target.matches(".img-user")) d.querySelector(".user-info").classList.toggle("d-none");

        });
    </script>
</body>

</html>