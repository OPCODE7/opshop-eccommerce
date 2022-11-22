<?php
$APP_NAME = "eccommerce";
$APP_URL = "http://localhost/eccommerce/";

class Env
{
    private $APP_URL;

    public function __construct()
    {
        $this->APP_URL = "http://localhost/eccommerce/";
    }


    public function Redirect($path)
    {
        $redirect_to = $this->APP_URL . $path;
        return $redirect_to;
    }
}
