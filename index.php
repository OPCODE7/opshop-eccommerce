<?php
    session_start();
    require_once "app/config/env.php";
    require_once "app/config/bootStrapper.php";

    $boot = new Boot();

    $redirect = $boot->Start();

    include $redirect;
