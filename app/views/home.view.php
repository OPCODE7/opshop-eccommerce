<?php
// session_destroy();
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
    <title>OpShop</title>
</head>

<body>
    <div class="container-fluid p-0 d-flex flex-wrap min-vh-100">
        <header class="w-100 ">
            <nav class="navbar navbar-expand-lg bg-black w-100 d-flex justify-content-between d-flex align-items-center px-3">
                <div class="d-flex flex-row align-items-center w-50">
                    <a class="navbar-brand" href="<?php echo $APP_URL . "home" ?>">
                        <img src="<?php echo $APP_URL . "app/storage/img_app/op-logo-white.jpg" ?>" alt="OPLOGO">
                    </a>

                    <div class="nav-expand" id="nav">
                        <span class="fas fa-close text-white fs-3"></span>
                        <ul class="navbar-nav d-flex">
                            <li class="nav-item">
                                <a class="nav-link " href="<?php echo $APP_URL . "app/views/home" ?>">HOME</a>
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
                        </ul>
                    </div>
                </div>
                <i class="fa-solid fa-bars text-white"></i>

                <div class="w-25">
                    <ul class="navbar-nav w-100 d-flex flex-row justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link fas fa-user" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fa-solid fa-heart position-relative" href="#">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-white p-1" style="width: 1.2rem; height: 1.2rem;"><span class="text-dark">0</span></span>
                                <!-- <span class="position-absolute" style="font-size: .9rem; top: -5px;">0</span> -->
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fa-solid fa-cart-shopping position-relative" href="#">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-white p-1" style="width: 1.2rem; height: 1.2rem;"><span class="text-dark">0</span></span>
                                <!-- <span class="position-absolute" style="font-size: .9rem; top: -5px;">0</span> -->
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>
        <main class="row w-100">
            <div class="col-12">
                <!-- Aqui van a ir las vistas -->
                <?php
                include "app/views/productos/save_product.view.php";
                ?>
            </div>
        </main>
        <footer class="bg-black text-center align-self-end w-100 py-4">
            <small class="text-white">Desarrollado por @OpCode 2022</small>
        </footer>
    </div>
    <script src="<?php echo $APP_URL . "public/js/bootstrap.min.js" ?>"></script>
    <script>
        const d = document;

        const $menu = d.querySelector("#nav");


        d.addEventListener("click", e => {
            if (e.target.matches(".fa-bars"))
                $menu.classList.add("nav-collapse");


            if (e.target.matches(".fa-close"))
                $menu.classList.remove("nav-collapse");

        });
    </script>
</body>

</html>