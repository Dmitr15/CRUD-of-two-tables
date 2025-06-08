<?php
error_reporting(E_ERROR | E_PARSE);

require_once("core.php");
require_once('head.php');
$suppliers = UserTable::get_all_suppliers();
$products = UserTable::get_all_products();
$errors = UserAction::addRelationship();

?>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/Lr6/supplier.php">Связи</a>
            </li>
            <li class="breadcrumb-item active">
                Новая связь
            </li>
        </ol>
    </nav>

    <div class="row">
        <h2>Добавить связь</h2>
    </div>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger" role="alert"><?= $errors ?></div>
    <?php endif; ?>

    <form action="" class="row row-cols-lg-auto g-3 align-items-center ">
        <div class="col-4">
            <select class="form-select" name="setProductSupplier">
                <option value>Бренд</option>
                <?php
                foreach ($suppliers as $supplier) {
                    echo "<option value=" . $supplier['id'] . ">" . $supplier['namesupplier'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-4">
            <select class="form-select" name="setProduct">
                <option value>Товар</option>
                <?php
                foreach ($products as $product) {
                    echo "<option value=" . $product['id'] . ">" . $product['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-4">
            <button class="btn btn-primary" type="submit">Отправить</button>
        </div>
    </form>
</div>