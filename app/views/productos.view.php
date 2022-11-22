<?php
require_once("app/config/env.php");

$env = new Env();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $APP_URL . "public/css/bootstrap.min.css" ?>">
    <title>Eccommerce | Productos</title>
</head>

<body>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script src="<?php echo $APP_URL . "public/js/bootstrap.min.js" ?>"></script>
</body>

</html>