<?php
    class brandController{
        
        private $brandModel;
        private $Env;

        public function __construct()
        {
            require_once("app/models/brandModel.php");
            require_once("app/config/env.php");
            $this->brandModel = new brandModel();
            $this->Env = new Env();
        }

        public function getBrands(){
            $recordset= $this -> brandModel -> getBrands();
            return $recordset;
        }
    }

?>
