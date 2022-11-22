<?php
require_once("app/controllers/userController.php");
$userController = new UserController();

$username = "";
$email = "";
$password = "";
$passwordConfirm = "";
$avatar = "";
$role = "";
$errorsvalidate = "";

if (isset($_POST["register"])) {
    $username = $_POST["user"];
    $password = $_POST["password"];
    $passwordConfirm= $_POST["password-confirm"];
    $email = $_POST["email"];

    if (isset($_FILES["imagen"]["name"])) {
        $avatar = $_FILES["imagen"];
    } else {
        $avatar = "";
    }

    if (isset($_POST["role"])) {
        $role = $_POST["role"];
    } else {
        $role = "";
    }

    $data = [
        "username" => $username,
        "email" => $email,
        "pwd" => $password,
        "pwdconfirm" => $passwordConfirm,
        "role" => $role,
    ];


    $errorsvalidate = $userController->saveUser($data, $avatar);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpShop | Register</title>
    <link rel="stylesheet" href="<?php echo $APP_URL . "public/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo $APP_URL . "public/css/style.css" ?>">
</head>

<body class="bg-light">
    <div class="container-fluid d-flex align-items-center d-flex justify-content-center min-vh-100">
        <div class="row w-100 d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-5 text-center">
                <div class="card shadow bg-body rounded">
                    <div class="card-header text-start">
                        <h5><b>Inicia Sesión</b></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="user" class="form-label text-start d-block ">Usuario</label>
                                        <input type="text" class="form-control p-2" name="user" placeholder="Escribe tu usuario" value="<?php echo $username ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-start d-block ">Correo</label>
                                        <input type="email" class="form-control p-2" name="email" placeholder="Escribe tu correo" value="<?php echo $email ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label text-start d-block ">Contraseña</label>
                                        <input type="password" class="form-control p-2" name="password" placeholder="Escribe tu contraseña" value="<?php echo $password ?>">
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label text-start d-block ">Confirmar contraseña</label>
                                        <input type="password" class="form-control p-2" name="password-confirm" placeholder="Repite tu contraseña" value="<?php echo $passwordConfirm ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="imagen" class="form-label text-start d-block ">Avatar</label>
                                        <input type="file" class="form-control p-2" name="imagen">
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label d-block text-start">Rol de Usuario</label>
                                        <select id="role" class="form-select" name="role">
                                            <option>Seleccionar rol</option>
                                            <option>ADMIN</option>
                                            <option>SUPER</option>
                                            <option>USUARIO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="register" class="btn btn-primary m-auto w-50 my-3 py-2">Registrarse</button>
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
                        <a href="<?php echo $APP_URL . "login" ?>" class="text-decoration-none">Iniciar Sesión</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo $APP_URL . "public/js/bootstrap.min.js" ?>"></script>
</body>

</html>