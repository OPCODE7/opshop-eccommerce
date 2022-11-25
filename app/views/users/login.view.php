<?php
require_once("app/controllers/userController.php");
$usercontroller = new UserController();
$username = "";
$password = "";

$errorsvalidate = "";

if (isset($_POST["login"])) {
    $username = $_POST["user"];
    $password = $_POST["password"];

    $data = [
        "username" => $username,
        "password" => $password
    ];

    $errorsvalidate = $usercontroller->ValidateLogin($data);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | OpShop</title>
    <link rel="stylesheet" href="<?php echo $APP_URL . "public/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo $APP_URL . "public/css/style.css" ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="shortcut icon" href="<?php echo $APP_URL . "app/storage/img_app/opcode.ico" ?>" type="image/x-icon">
</head>

<body class="bg-light">
    <div class="container-fluid d-flex align-items-center d-flex justify-content-center min-vh-100">
        <div class="row w-100 d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-4 text-center">
                <div class="card shadow bg-body rounded">
                    <div class="card-header text-start">
                        <h5><b>Inicia Sesión</b></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="user" class="form-label text-start d-block ">Usuario</label>
                                <input type="text" class="form-control p-2" name="user" placeholder="Escribe tu usuario" value="<?php echo $username ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-start d-block ">Contraseña</label>
                                <input type="password" class="form-control p-2" name="password" placeholder="Escribe tu contraseña" value="<?php echo $password ?>">
                            </div>

                            <button type="submit" name="login" class="btn btn-primary m-auto w-50 my-3 py-2">Iniciar Sesión</button>
                        </form>
                        <?php
                        if ($errorsvalidate != "") {

                        ?>
                            <div class="row my-2">
                                <div class="col-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?php echo $errorsvalidate ?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="w-100 m-auto d-flex flex-column d-flex align-items-center py-2 card-footer">
                        <a href=" " class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                        <a href="<?php echo $APP_URL. "register"?>" class="text-decoration-none">¿No tienes cuenta? Registrate</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo $APP_URL . "public/js/bootstrap.min.js" ?>"></script>
</body>

</html>