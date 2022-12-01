<?php
require_once("app/models/connectionModel.php");

class paginationModel
{
    private $conMySql;

    public function __construct()
    {
        require_once("app/models/connectionModel.php");
        $this->conMySql = Connect::ConnectMySql();
    }

    public function paginate($tableName){
        try{
            $query= "SELECT COUNT(*) AS TOTALROWS FROM {$tableName}";

            $stmt = $this->conMySql->prepare($query);

            $stmt->execute();

            $rows = $stmt->fetch();

            return $rows;
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    public function paginateDel($tableName){
        try{
            $del= "S";
            $query= "SELECT COUNT(*) AS TOTALROWS FROM {$tableName} WHERE DEL=:del";

            $stmt = $this->conMySql->prepare($query);
            $stmt->bindParam("del",$del);
            $stmt->execute();

            $rows = $stmt->fetch();

            return $rows;
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }
}
