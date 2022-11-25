<?php
class Boot
{

    public function Start()
    {
        $view = "";
        if (isset($_SESSION["userlogged"])) {

            $view = "app/views/home.view.php";
        } else {
            $view = "app/views/users/login.view.php";
        }

        if (isset($_GET["view"]) && $_GET["view"] == "forgotPassword") {
            $view = "app/views/users/forgotPassword.view.php";
        }

        if (isset($_GET["view"]) && $_GET["view"] == "register") {
            $view = "app/views/users/register.view.php";
        }
        return $view;
    }
}
