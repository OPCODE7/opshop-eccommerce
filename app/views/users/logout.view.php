<?php
    require_once ("app/config/env.php");
    $env = new Env();

    session_destroy();
    $redirect= $env->Redirect("");
    echo "<script>location.href='$redirect';</script>";
