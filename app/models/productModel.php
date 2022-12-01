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
            $query = "Select * from productos where del=:del order by ID";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":del", $delete);

            $stmt->execute();

            $recordset = $stmt->fetchAll();

            return $recordset;
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    public function getProductsDel()
    {
        try {
            $delete = "S";
            $query = "Select * from productos where del=:del order by ID";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":del", $delete);

            $stmt->execute();

            $recordset = $stmt->fetchAll();

            return $recordset;
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    public function getProduct($id){
        try{
            $query= "SELECT A.NOMBRE,A.DESCRIPCION,A.PRECIO,A.IMAGENPRODUCTO,A.MARCA AS IDMARCA,A.CATEGORIA AS IDCATEGORIA,B.NOMBRE AS MARCA ,C.NOMBRE AS CATEGORIA
            FROM productos A INNER JOIN marcas B ON(A.MARCA=B.ID) INNER JOIN 
            categorias C ON(A.CATEGORIA=C.ID)  WHERE A.ID=:id";

            $stmt= $this -> ConMySql-> prepare($query);
            $stmt -> bindParam(":id", $id);

            $stmt->execute();
            $product= $stmt->fetch();
    
            return $product;
        }catch(PDOException $error){
            echo $error->getMessage();
            
        }
    }



    public function saveProduct($data, $file)
    {
        try {
            $rowsafected = "";

            $query = "Insert into productos(NOMBRE,DESCRIPCION,PRECIO,CATEGORIA,MARCA,IMAGENPRODUCTO)
            values (:name,:description,:price,:category,:brand,:imageproduct)";
            $stmt = $this->ConMySql->prepare($query);

            $nameProduct= strtoupper($data["nameproduct"]);
            $description= strtoupper($data["description"]);
            $price= strtoupper($data["price"]);
            
            $stmt->bindParam(":name", $nameProduct);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":price", $price);
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

    public function updateProduct($data, $file)
    {
        try {
            $rowsafected = "";

            $query = "UPDATE productos SET NOMBRE=:name,DESCRIPCION=:description, PRECIO=:price,
            CATEGORIA=:category, MARCA=:brand,IMAGENPRODUCTO=:imageproduct WHERE ID=:id";

            $stmt = $this->ConMySql->prepare($query);

            $nameProduct= strtoupper($data["nameproduct"]);
            $description= strtoupper($data["description"]);
            $price= strtoupper($data["price"]);
            
            $stmt->bindParam(":id", $data["id"]);
            $stmt->bindParam(":name", $nameProduct);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":price", $price);
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

    public function logicDelete($id){
        $rowsafected=0;
        $del="S";
        $condition= "N";
        try{
            $query= "UPDATE productos SET DEL=:del WHERE ID=:id AND DEL=:condition";
            $stmt= $this->ConMySql->prepare($query);
            $stmt->bindParam(":id",$id);
            $stmt->bindParam(":del",$del);
            $stmt->bindParam(":condition",$condition);
            $stmt->execute();

            $rowsafected= $stmt->rowCount();
            return  $rowsafected;
        }catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function destroy($id){
        $rowsafected=0;
        $condition= "S";
        try{
            $query= "DELETE FROM productos WHERE ID=:id AND DEL=:condition";
            $stmt= $this->ConMySql->prepare($query);
            $stmt->bindParam(":id",$id);
            $stmt->bindParam(":condition",$condition);
            $stmt->execute();

            $rowsafected= $stmt->rowCount();
            return  $rowsafected;
        }catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function recovery($id){
        $rowsafected=0;
        $condition= "S";
        $del= "N";
        try{
            $query= "UPDATE productos SET DEL=:del WHERE ID=:id AND DEL=:condition";

            $stmt= $this->ConMySql->prepare($query);
            $stmt->bindParam(":id",$id);
            $stmt->bindParam(":del",$del);
            $stmt->bindParam(":condition",$condition);
            $stmt->execute();

            $rowsafected= $stmt->rowCount();
            return  $rowsafected;
        }catch (PDOException $error) {
            echo $error->getMessage();
        }
    }


}
