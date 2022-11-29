<div class="container-fluid bg-info p-0 w-100 min-vh-100">
    <div class="row">
        <div class="position-fixed bg-black py-0 m-0" style="top: 11vh;height: 90vh;width: 40vh;">
            <div class="col-12">
                <div class="row px-4">
                    <div class="col-12 text-center mt-2">
                        <img src="<?php echo $APP_URL . "app/storage/img_app/op-logo-white.jpg" ?>" alt="OPLOGO" style="width: 80px; height: 80px;">
                    </div>
                    <div class="col-12 text-center mb-4">
                        <span class="text-secondary mx-2 mb-2">ADMINISTRACIÓN</span>
                    </div>
                    <div class="col-12  mb-3 item-menu-admin">
                        <a href="#" class="text-decoration-none  d-block rounded p-2">
                            <i class="fa-solid fa-tag"></i>
                            <span class="mx-2">Marcas</span>
                        </a>
                    </div>
                    <div class="col-12  mb-3 item-menu-admin">
                        <a href="#" class="text-decoration-none d-block rounded p-2">
                            <i class="fa-solid fa-bars-progress"></i>
                            <span class="mx-2">Categorias</span>
                        </a>
                    </div>
                    <div class="col-12 mb-3 item-menu-admin">
                        <a href="#" class="text-decoration-none  d-block rounded  p-2">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="mx-2">Productos</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  bg-success">
            <h1><?php echo "Bienvenido {$userData["username"]}" ?></h1>
        </div>
    </div>
</div>