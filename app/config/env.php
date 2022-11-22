<?php
$APP_NAME = "proyectoci2";
$APP_URL = "http://localhost/proyectoci2/";

class Env
{
    private $APP_URL;

    public function __construct()
    {
        $this->APP_URL = "http://localhost/proyectoci2/";
    }


    public function Redirect($path)
    {
        $redirect_to = $this->APP_URL . $path;
        return $redirect_to;
    }
}
