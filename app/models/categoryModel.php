<?php
class categoryModel
{
    private $ConMySql;

    public function __construct()
    {
        require_once("app/models/connectionModel.php");
        $this->ConMySql = Connect::ConnectMySql();
    }

    public function getCategories($start,$limit)
    {
        try {
            $delete = "N";
            $query = "Select * from categorias where del=:del order by id limit {$start},{$limit} ";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":del", $delete);

            $stmt->execute();

            $recordset = $stmt->fetchAll();

            return $recordset;
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    public function getCategoriesDel($start,$limit)
    {
        try {
            $delete = "S";
            $query = "SELECT * FROM categorias  WHERE del=:del ORDER BY ID LIMIT {$start},{$limit}";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":del", $delete);

            $stmt->execute();

            $recordset = $stmt->fetchAll();

            return $recordset;
        } catch (PDOException $error) {
            $error->getMessage();
        }
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

    public function getCategory($id){
        try{
            $query= "SELECT * FROM categorias  WHERE ID=:id";

            $stmt= $this -> ConMySql-> prepare($query);
            $stmt -> bindParam(":id", $id);

            $stmt->execute();
            $category= $stmt->fetch();
    
            return $category;
        }catch(PDOException $error){
            echo $error->getMessage();
            
        }
    }

    public function saveCategory($data)
    {
        try {
            $rowsafected = "";

            $query = "Insert into categorias(NOMBRE)
            values (:name)";
            $stmt = $this->ConMySql->prepare($query);

            $nameCategory= strtoupper($data["namecategory"]);
            
            $stmt->bindParam(":name", $nameCategory);
            

            $stmt->execute();

            $rowsafected = $stmt->rowCount();
            return $rowsafected;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function updateCategory($data)
    {
        try {
            $rowsafected = "";

            $query = "UPDATE categorias SET NOMBRE=:name WHERE ID=:id";
            $stmt = $this->ConMySql->prepare($query);

            $nameCategory= strtoupper($data["namecategory"]);
            
            $stmt->bindParam(":id", $data["idcategory"]);
            $stmt->bindParam(":name", $nameCategory);
            

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
            $query= "UPDATE categorias SET DEL=:del WHERE ID=:id AND DEL=:condition";
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
            $query= "DELETE FROM categorias WHERE ID=:id AND DEL=:condition";
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
            $query= "UPDATE categorias SET DEL=:del WHERE ID=:id AND DEL=:condition";

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
