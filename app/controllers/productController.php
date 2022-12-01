<?php

class productController
{
    private $productModel;
    private $Env;

    public function __construct()
    {
        require_once("app/models/productModel.php");
        require_once("app/config/env.php");
        $this->productModel = new productModel();
        $this->Env = new Env();
    }

    public function getProducts()
    {
        $recordset = $this->productModel->getProducts();
        return $recordset;
    }

    public function getProductsDel()
    {
        $recordset = $this->productModel->getProductsDel();
        return $recordset;
    }

    public function getProduct($id)
    {
        $product = $this->productModel->getProduct($id);
        return $product;
    }
    public function saveProduct($data, $image)
    {
        $error = "";
        if ($data["nameproduct"] == "") {
            $error = "El campo nombre es requerido";
            return $error;
        }
        if ($data["price"] == "") {
            $error = "El campo precio es requerido";
            return $error;
        }
        
        if ($data["description"] == "") {
            $error = "El campo descripción es requerido";
            return $error;
        }
        
       
        if ($data["categories"] == "") {
            $error = "Seleccione una categoría de producto";
            return $error;
        }
        if ($data["brand"] == "") {
            $error = "Seleccione una marca";
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
        $imgserver = str_replace($forbidenchars, "", $data["nameproduct"]) . str_replace($forbidenchars, "", $namefile);
        $path = "app/storage/img_products/";
        $destino = $path . $imgserver;

        move_uploaded_file($temp_name, $destino);

        $rowsafected = $this->productModel->saveProduct($data, $destino);

        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("products/list");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al registrar producto";
            return $error;
        }
    }

    public function updateProduct($data, $image)
    {
        $error = "";
        $destino= $data["image"];
        if ($data["nameproduct"] == "") {
            $error = "El campo nombre es requerido";
            return $error;
        }
        if ($data["brand"] == "") {
            $error = "Seleccione una marca";
            return $error;
        }
        if ($data["description"] == "") {
            $error = "El campo descripción es requerido";
            return $error;
        }
        if ($data["price"] == "") {
            $error = "El campo precio es requerido";
            return $error;
        }
        if ($data["categories"] == "") {
            $error = "Seleccione una categoría de producto";
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
            $imgserver = str_replace($forbidenchars, "", $data["nameproduct"]) . str_replace($forbidenchars, "", $namefile);
            $path = "app/storage/img_products/";
            $destino = $path . $imgserver;

            move_uploaded_file($temp_name, $destino);
        }


        $rowsafected = $this->productModel->updateProduct($data, $destino);

        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("products/list");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al actualizar producto";
            return $error;
        }
    }

    public function logicDelete($id){
        $rowsafected=0;
        $error="";
        $rowsafected= $this->productModel->logicDelete($id);
        if($rowsafected>0){
            $destino= $this -> Env-> Redirect("products/list");
            echo "<script>location.href='$destino';</script>";
        }else{
        $error="Error al eliminar producto";
        return $error;
        }

    }

    public function destroy($id){
        $rowsafected=0;
        $error="";
        $rowsafected= $this->productModel->destroy($id);
        if($rowsafected>0){
            $destino= $this -> Env-> Redirect("products/paperbin");
            echo "<script>location.href='$destino';</script>";
        }else{
        $error="Error al eliminar producto";
        return $error;
        }
    }

    public function recovery($id){
        $rowsafected=0;
        $error="";
        $rowsafected= $this->productModel->recovery($id);
        if($rowsafected>0){
            $destino= $this -> Env-> Redirect("products/paperbin");
            echo "<script>location.href='$destino';</script>";
        }else{
        $error="Error al recuperar producto";
        return $error;
        }
    }
}
