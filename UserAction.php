<?php
//session_start();
class UserAction
{
    public static function addProductField(): array
    {
        $errors = [];
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return [];
        }

        if (empty($_FILES['setProductPhoto']['name'])) {
            $errors[] = 'Выберите картинку';
        }

        if (empty($_POST['setProductName'])) {
            $errors[] = 'Заполните название';
        }

        if (empty($_POST['setProductDescription'])) {
            $errors[] = 'Заполните описание';
        }

        if (empty($_POST['setProductPrice'])) {
            $errors[] = 'Заполните цену';
        }

        if (empty($_POST['setProductSupplier'])) {
            $errors[] = 'Выберите поставщика';
        }

        if (empty($errors)) {
            UserTable::add_product($_FILES['setProductPhoto']['name'], $_POST['setProductName'], $_POST['setProductSupplier'], $_POST['setProductDescription'], $_POST['setProductPrice']);
            header("Location: http://localhost/Lr6/product.php");
            //return $errors;
        }

        return $errors;
    }


    public static function addSupplier(): array
    {
        $errors = [];
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return [];
        }

        if (empty($_POST['setSupplierName'])) {
            $errors[] = 'Заполните название';
        }

        if (empty($errors)) {
            UserTable::add_supplier($_POST['setSupplierName']);
            header("Location: http://localhost/Lr6/supplier.php");
            return $errors;
        }

        return $errors;
    }


    public static function addRelationship(): array
    {
        $errors = [];

        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return [];
        }


        return $errors;
    }

    public static function editProduct(int $id): array
    {
        $errors = [];
        if (!(isset($_POST['update']))) {
            return [];
        }

        if (empty($_FILES['setProductPhoto']['name'])) {
            $errors[] = 'Выберите картинку';
        }

        if (empty($_POST['setProductName'])) {
            $errors[] = 'Заполните название';
        }

        if (empty($_POST['setProductDescription'])) {
            $errors[] = 'Заполните описание';
        }

        if (empty($_POST['setProductPrice'])) {
            $errors[] = 'Заполните цену';
        }

        if (empty($_POST['setProductSupplier'])) {
            $errors[] = 'Выберите поставщика';
        }


        if (empty($errors)) {
            UserTable::edit_product($id, $_FILES['setProductPhoto']['name'], $_POST['setProductName'], intval($_POST['setProductSupplier']), $_POST['setProductDescription'], intval($_POST['setProductPrice']));
            header("Location: http://localhost/Lr6/product.php");
        }
        return $errors;
    }

    public static function editSupplier(int $id): array
    {
        $errors = [];

        if (!(isset($_POST['update']))) {
            return [];
        }

        if (empty($_POST['setSupplierName'])) {
            $errors[] = 'Заполните название';
        }

        if (empty($errors)) {
            UserTable::edit_supplier($id, $_POST['setSupplierName']);
            header("Location: http://localhost/Lr6/supplier.php");
        }
        return $errors;
    }
}
