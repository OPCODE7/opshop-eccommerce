<?php

class productModel
{
    private $ConMySql;

    public function __construct()
    {
        require_once("app/models/connectionModel.php");
        $this->ConMySql = Connect::ConnectMySql();
    }


    public function getProducts()
    {
        try {
            $delete = "N";
            $query = "Select * from productos where del=:del order by id";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":del", $delete);

            $stmt->execute();

            $recordset = $stmt->fetchAll();

            return $recordset;
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }



    public function saveProduct($data, $file)
    {
        try {
            $rowsafected = "";

            $query = "Insert into productos(NOMBRE,DESCRIPCION,PRECIO,CATEGORIA,MARCA,IMAGENPRODUCTO)
            values (:name,:description,:price,:category,:brand,:imageproduct)";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":name", strtoupper($data["nameproduct"]));
            $stmt->bindParam(":description", strtoupper($data["description"]));
            $stmt->bindParam(":price", strtoupper($data["price"]));
            $stmt->bindParam(":category", $data["categories"]);
            $stmt->bindParam(":brand", $data["brand"]);
            $stmt->bindParam(":imageproduct", $file);

            $stmt->execute();

            $rowsafected = $stmt->rowCount();
            return $rowsafected;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
