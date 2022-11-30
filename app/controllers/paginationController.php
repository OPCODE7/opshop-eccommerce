<?php
    require_once("app/models/paginationModel.php");
    class paginationController{
        private $paginationModel;
        private $Env;

        public function __construct()
        {
            require_once("app/models/brandModel.php");
            require_once("app/config/env.php");
            $this->paginationModel = new paginationModel();
            $this->Env = new Env();
        }

        public function paginate($tableName,$size){
            $totalRows= $this->paginationModel -> paginate($tableName);
            $pages= $totalRows["TOTALROWS"]/$size;
            return $pages;
        }
    }
?>