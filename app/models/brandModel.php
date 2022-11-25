<?php
class brandModel
{
    private $ConMySql;

    public function __construct()
    {
        require_once("app/models/connectionModel.php");
        $this->ConMySql = Connect::ConnectMySql();
    }

    public function getBrands()
    {
        try {
            $delete = "N";
            $query = "Select * from marcas where del=:del order by id";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":del", $delete);

            $stmt->execute();

            $recordset = $stmt->fetchAll();

            return $recordset;
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }
}
?>