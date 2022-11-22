<?php
class Boot
{

    public function Start()
    {
        $view = "";
        if (isset($_SESSION["userlogged"])) {

            $view = "app/views/home.view.php";
        } else {
            $view = "app/views/login.view.php";
        }

        if (isset($_GET["view"]) && $_GET["view"] == "forgotPassword") {
            $view = "app/views/forgotPassword.view.php";
        }
        return $view;
    }
}
