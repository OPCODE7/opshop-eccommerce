<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | OpShop</title>
    <link rel="stylesheet" href="<?php echo $APP_URL . "public/css/bootstrap.min.css" ?>">
</head>

<body>
    <div class="container-fluid d-flex align-items-center d-flex justify-content-center min-vh-100">
        <div class="row bg-dark">
            <div class="col-12 col-md-8 col-lg-6">
                <form action="" method="POST" class="shadow-lg p-3 mb-5 bg-body rounded">
                    <div>
                        <label for="">SIGN IN</label>
                        <label for="">SIGN UP</label>
                    </div>
                    <div>
                        <img src="" alt="">

                        <input type="text" placeholder="Usuario">
                        <input type="password" placeholder="Contraseña">
                        <button type="submit">LOG IN</button>
                    </div>
                    <div>
                        <a href="">FORGOT PASSWORD?</a>
                    </div>
                    

                </form>
            </div>
        </div>
    </div>

    <script src="<?php echo $APP_URL . "public/js/bootstrap.min.js" ?>"></script>
</body>

</html>