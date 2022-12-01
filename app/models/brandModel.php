<?php
class brandModel
{
    private $ConMySql;

    public function __construct()
    {
        require_once("app/models/connectionModel.php");
        $this->ConMySql = Connect::ConnectMySql();
    }

    public function getBrands($start,$limit)
    {
        try {
            $delete = "N";
            $query = "Select * from marcas where del=:del order by id limit {$start},{$limit} ";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":del", $delete);

            $stmt->execute();

            $recordset = $stmt->fetchAll();

            return $recordset;
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    
    public function getBrandsDel()
    {
        try {
            $delete = "S";
            $query = "Select * from marcas where del=:del order by ID";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":del", $delete);

            $stmt->execute();

            $recordset = $stmt->fetchAll();

            return $recordset;
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    public function getBrand($id){
        try{
            $query= "SELECT * FROM marcas WHERE ID=:id";

            $stmt= $this -> ConMySql-> prepare($query);
            $stmt -> bindParam(":id", $id);

            $stmt->execute();
            $product= $stmt->fetch();
    
            return $product;
        }catch(PDOException $error){
            echo $error->getMessage();
            
        }
    }



    public function saveBrand($data, $file)
    {
        try {
            $rowsafected = "";

            $query = "Insert into marcas(NOMBRE,DESCRIPCION,AVATAR)
            values (:name,:description,:imageproduct)";
            $stmt = $this->ConMySql->prepare($query);

            $nameProduct= strtoupper($data["namebrand"]);
            $description= strtoupper($data["description"]);
            
            $stmt->bindParam(":name", $nameProduct);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":imageproduct", $file);

            $stmt->execute();

            $rowsafected = $stmt->rowCount();
            return $rowsafected;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function updateBrand($data, $file)
    {
        try {
            $rowsafected = "";

            $query = "UPDATE marcas SET NOMBRE=:name,DESCRIPCION=:description,AVATAR=:imageproduct WHERE ID=:id";

            $stmt = $this->ConMySql->prepare($query);

            $nameProduct= strtoupper($data["namebrand"]);
            $description= strtoupper($data["description"]);
            
            $stmt->bindParam(":id", $data["id"]);
            $stmt->bindParam(":name", $nameProduct);
            $stmt->bindParam(":description", $description);
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
            $query= "UPDATE marcas SET DEL=:del WHERE ID=:id AND DEL=:condition";
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
            $query= "DELETE FROM marcas WHERE ID=:id AND DEL=:condition";
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
            $query= "UPDATE marcas SET DEL=:del WHERE ID=:id AND DEL=:condition";

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
