<?php
class Routes
{
    public function Request($view)
    {

        $control = 0;
        if (isset($_GET["view"])) {
            $url = $_GET["view"];

            $pathview = "app/views/" . $_GET["view"] . ".view.php";

            if (file_exists($pathview)) {
                $response = $pathview;
                echo "aqui pasa";
            } else {
                $request = explode("/", $url);
                $aux = "";
                for ($i = 0; $i < count($request); $i++) {

                    $i == 0 ? $aux = $request[0] : $aux = $aux . "/" . $request[$i];


                    $view = "app/views/" . $aux . ".view.php";

                    if (file_exists($view)) {
                        $control++;
                        $response = $view;
                    }
                }

                if ($control == 0) {
                    $response = "app/views/404.view.php";
                }
            }
        } else {
            $response = "app/views/home.view.php";
        }

        return $response;
    }
}
