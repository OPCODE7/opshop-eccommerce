<?php
    class categoryController{
        
        private $categoryModel;
        private $Env;

        public function __construct()
        {
            require_once("app/models/categoryModel.php");
            require_once("app/config/env.php");
            $this->categoryModel = new categoryModel();
            $this->Env = new Env();
        }

        public function getCategories($start,$limit){
            $recordset= $this -> categoryModel -> getCategories($start,$limit);
            return $recordset;
        }
    }

?>
