<?php
error_reporting(E_ERROR | E_PARSE);

require_once("core.php");
require_once('head.php');

$supplier = UserTable::get_supplier_by_id(intval($_POST['id_supplier']));
$errors = UserAction::editSupplier(intval($_POST['id']));

?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/Lr6/product.php">Продукты</a>
            </li>
            <li class="breadcrumb-item active">
                Редактировать производителя <?= $product['0']['name'] ?>
            </li>
        </ol>
    </nav>

    <div class="row">
        <h2>Редактировать продукт</h2>
    </div>

    <form class="row row-cols-lg-auto g-3 align-items-center" method="POST" enctype="multipart/form-data">
        <div class="col-4">
            <input type="hidden" class="form-control" name="id" value="<?= $_POST['id_supplier'] ?>">
            <input type="text" class="form-control" placeholder="Название товара" name="setSupplierName" value="<?= $supplier['0']['namesupplier'] ?>">
        </div>
        <div class="col-4">
            <button class="btn btn-primary" name="update" type="submit">Отправить</button>
        </div>
    </form>

</div>