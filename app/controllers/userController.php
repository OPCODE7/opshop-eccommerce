<?php
class UserController
{

    private $userModel;
    private $Env;
    public function __construct()
    {
        require_once("app/models/userModel.php");
        require_once("app/config/env.php");
        $this->userModel = new userModel();
        $this->Env = new Env();
        
    }


    //Metodo ValidateLogin
    //Verificar que el usuario ingrese nombre y clave al iniciar sesion
    public function ValidateLogin($data)
    {
        $error = "";
        if ($data["username"] == "") {
            $error = "Ingresar nombre de usuario para iniciar sesion!";
            return $error;
        }

        if ($data["password"] == "") {
            $error = "Ingresar la clave de usuario para iniciar sesion!";
            return $error;
        }

        $recordset = $this->userModel->CheckLogin($data["username"]);
        if ($recordset) {
            $user = $data["username"];
            $pass = $data["password"];
            if ($user == $recordset["NOMBRE"] && $pass == $recordset["PWD"]) {
                $_SESSION["userlogged"] = $user;
                $redirect = "http://localhost/eccommerce/";
                header("location: $redirect");
                $error = $user;
            } else {
                $error = "Usuario y/o contraseña incorrecta";
                return $error;
            }
        } else {
            $error = "Usuario no existe";
            return $error;
        }
    }
    //Fin Metodo ValidateLogin

    public function saveUser($data, $avatar)
    {
        $error = "";
        if ($data["username"] == "") {
            $error = "El campo usuario es requerido";
            return $error;
        }
        if ($data["pwd"] == "") {
            $error = "El campo contraseña es requerido";
            return $error;
        }
        if($data["pwdconfirm"]!=$data["pwd"]){
            $error= "Las contraseñas no coinciden";
            return $error;
        }
        if ($avatar == "") {
            $error = "Seleccione un archivo!";
            return $error;
        }
        if($data["role"]==""){
            $error= "Seleccione el rol de usuario!!!";
        }

        $type_img = $avatar["type"];

        if ($type_img != 'image/jpeg' && $type_img != 'image/jpg' && $type_img != 'image/gif' && $type_img != 'image/png') {
            $error = "Tipo de archivo no admitido";
            return $error;
        }
        $forbidenchars = [" ", "/", "-", "!", "="];

        $namefile = $avatar["name"];
        $temp_name = $avatar["tmp_name"];
        $imgserver = str_replace($forbidenchars, "", $data["username"]) . str_replace($forbidenchars, "", $namefile);
        $path = "app/storage/img_users/";
        $destino = $path . $imgserver;

        move_uploaded_file($temp_name, $destino);

        $rowsafected = $this->userModel->saveUser($data, $destino);

        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("home");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al registrar cliente";
            return $error;
        }
    }

    //GetUsers
    public function GetUsers()
    {
        $recordset = $this->UserModel->GetUsers();
        return $recordset;
    }


    //Fin Getusers
}
