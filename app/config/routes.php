<?php
class Routes
{
    public function Request($view){
			
        $control = 0;
        if (isset($_GET["view"])) {
            $url = $_GET["view"];

            $pathview = "app/views/".$_GET["view"].".view.php";

            if(file_exists($pathview)){
                $response = $pathview;
            }else{
                $request = explode("/", $url);

                $aux="";
                for($i=0;$i<count($request);$i++){
                    
                    if($i==0){
                        $aux = $request[0];
                    }else{
                        $aux = $aux ."/". $request[$i];
                    }

                    $view = "app/views/".$aux.".view.php";

                    if (file_exists($view)) {
                        $control++;
                        $response = $view;
                    }
                }

                if ($control==0 || $control==4) {
                    $response ="app/views/404.view.php";
                }
        }
    }else{
        $response ="app/views/products/list.view.php";
    }

    return $response;
}
}
