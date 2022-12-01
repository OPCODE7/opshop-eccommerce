<?php
class categoryController
{

    private $categoryModel;
    private $Env;

    public function __construct()
    {
        require_once("app/models/categoryModel.php");
        require_once("app/config/env.php");
        $this->categoryModel = new categoryModel();
        $this->Env = new Env();
    }

    public function getCategories($start, $limit)
    {
        $recordset = $this->categoryModel->getCategories($start, $limit);
        return $recordset;
    }

    public function getCategoriesDel($start,$limit)
    {
        $recordset = $this->categoryModel->getCategoriesDel($start,$limit);
        return $recordset;
    }

    public function getCategory($id)
    {
        $category = $this->categoryModel->getCategory($id);
        return $category;
    }
    public function saveCategory($data)
    {
        $errors = "";

        if ($data["namecategory"] == "") {
            $errors = "El campo nombre de la categoría es requerido";
            return $errors;
        }

        $rowsafected = $this->categoryModel->saveCategory($data);

        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("categories/list");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al registrar categoria";
            return $error;
        }
    }

    public function updateCategory($data)
    {
        $errors = "";

        if ($data["namecategory"] == "") {
            $errors = "El campo nombre de la categoría es requerido";
            return $errors;
        }

        $rowsafected = $this->categoryModel->updateCategory($data);

        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("categories/list");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al editar categoria";
            return $error;
        }
    }

    public function logicDelete($id)
    {
        $rowsafected = 0;
        $error = "";
        $rowsafected = $this->categoryModel->logicDelete($id);
        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("categories/list");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al eliminar categoria";
            return $error;
        }
    }

    public function destroy($id)
    {
        $rowsafected = 0;
        $error = "";
        $rowsafected = $this->categoryModel->destroy($id);
        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("categories/paperbin");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al eliminar categoría";
            return $error;
        }
    }

    public function recovery($id)
    {
        $rowsafected = 0;
        $error = "";
        $rowsafected = $this->categoryModel->recovery($id);
        if ($rowsafected > 0) {
            $destino = $this->Env->Redirect("categories/paperbin");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al recuperar categoría";
            return $error;
        }
    }
}
