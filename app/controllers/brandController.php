<?php
class brandController
{

    private $brandModel;
    private $Env;

    public function __construct()
    {
        require_once("app/models/brandModel.php");
        require_once("app/config/env.php");
        $this->brandModel = new brandModel();
        $this->Env = new Env();
    }

    public function getBrands($start, $limit)
    {
        $recordset = $this->brandModel->getBrands($start, $limit);
        return $recordset;
    }


    public function getBrandsDel()
    {
        $recordset = $this->brandModel->getBrandsDel();
        return $recordset;
    }

    public function getBrand($id)
    {
        $brand = $this->brandModel->getBrand($id);
        return $brand;
    }
    public function saveBrand($data, $image)
    {
        $error = "";
        if ($data["namebrand"] == "") {
            $error = "El campo nombre es requerido";
            return $error;
        }

        if ($data["description"] == "") {
            $error = "El campo descripción es requerido";
            return $error;
        }

        if ($image == "") {
            $error = "Seleccione un archivo!";
            return $error;
        }

        $type_img = $image["type"];

        if ($type_img != 'image/jpeg' && $type_img != 'image/jpg' && $type_img != 'image/gif' && $type_img != 'image/png') {
            $error = "Tipo de archivo no admitido";
            return $error;
        }
        $forbidenchars = [" ", "/", "-", "!", "="];

        $namefile = $image["name"];
        $temp_name = $image["tmp_name"];
        $imgserver = str_replace($forbidenchars, "", $data["namebrand"]) . str_replace($forbidenchars, "", $namefile);
        $path = "app/storage/img_brands/";
        $destino = $path . $imgserver;

        move_uploaded_file($temp_name, $destino);

        $rowsafected = $this->brandModel->saveBrand($data, $destino);

        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("brands/list");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al registrar marca";
            return $error;
        }
    }

    public function updateBrand($data, $image)
    {
        $error = "";
        $destino = $data["image"];
        if ($data["namebrand"] == "") {
            $error = "El campo nombre es requerido";
            return $error;
        }
       
        if ($data["description"] == "") {
            $error = "El campo descripción es requerido";
            return $error;
        }
        if ($image != "") {
            $type_img = $image["type"];

            if ($type_img != 'image/jpeg' && $type_img != 'image/jpg' && $type_img != 'image/gif' && $type_img != 'image/png') {
                $error = "Tipo de archivo no admitido";
                return $error;
            }
            $forbidenchars = [" ", "/", "-", "!", "="];

            $namefile = $image["name"];
            $temp_name = $image["tmp_name"];
            $imgserver = str_replace($forbidenchars, "", $data["namebrand"]) . str_replace($forbidenchars, "", $namefile);
            $path = "app/storage/img_brands/";
            $destino = $path . $imgserver;

            move_uploaded_file($temp_name, $destino);
        }


        $rowsafected = $this->brandModel->updateBrand($data, $destino);

        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("brands/list");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al actualizar marca";
            return $error;
        }
    }

    public function logicDelete($id)
    {
        $rowsafected = 0;
        $error = "";
        $rowsafected = $this->brandModel->logicDelete($id);
        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("brands/list");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al eliminar producto";
            return $error;
        }
    }

    public function destroy($id)
    {
        $rowsafected = 0;
        $error = "";
        $rowsafected = $this->brandModel->destroy($id);
        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("brands/paperbin");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al eliminar marca";
            return $error;
        }
    }

    public function recovery($id)
    {
        $rowsafected = 0;
        $error = "";
        $rowsafected = $this->brandModel->recovery($id);
        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("brands/paperbin");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al recuperar marca";
            return $error;
        }
    }
}
