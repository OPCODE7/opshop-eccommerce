<?php

use FTP\Connection;

class UserModel
{
    private $ConMySql;

    public function __construct()
    {
        require_once("app/models/connectionModel.php");
        $this->ConMySql = Connect::ConnectMysql();
    }

    public function CheckLogin($username)
    {
        $status = "ACTIVA";
        $del = "N";

        try {
            $query = "SELECT * FROM usuarios WHERE NOMBRE=:usuario AND DEL=:del AND ESTADO=:estado";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":usuario", $username);
            $stmt->bindParam(":del", $del);
            $stmt->bindParam(":estado", $status);

            $stmt->execute();

            $recordset = $stmt->fetch();

            return $recordset;
        } catch (PDOException $error) {
            echo $error->getmessage();
        }
    }

    public function saveUser($data, $file)
    {
        try {
            $rowsafected = "";

            $query = "Insert into usuarios(NOMBRE,PWD,CORREO,ROL,AVATAR)
            values (:usuario,:pwd,:email,:role,:avatar)";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":usuario", $data["username"]);
            $stmt->bindParam(":pwd", $data["pwd"]);
            $stmt->bindParam(":email", $data["email"]);
            $stmt->bindParam(":role", $data["role"]);
            $stmt->bindParam(":avatar", $file);


            $stmt->execute();

            $rowsafected = $stmt->rowCount();
            return $rowsafected;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    //GetUsers
    public function GetUsers()
    {
        $delete = "N";
        $estatus = "ACTIVA";
        try {
            $query = "Select * from usuarios where DEL=:del and ESTADO=:estado";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->bindParam(":del", $delete);
            $stmt->bindParam(":estado", $estatus);
            $stmt->execute();
            $recordset = $stmt->fetchAll();

            return $recordset;
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }

    //Fin GetUsers
}
