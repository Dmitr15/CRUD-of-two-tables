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
            DataAction::add_product($_FILES['setProductPhoto']['name'], $_POST['setProductName'], $_POST['setProductSupplier'], $_POST['setProductDescription'], $_POST['setProductPrice']);
            return $errors;
        }

        return $errors;
    }
}
