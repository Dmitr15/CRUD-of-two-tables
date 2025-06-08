<?php
error_reporting(E_ERROR | E_PARSE);

require_once("core.php");
require_once('head.php');


$errors = UserAction::editProduct(intval($_POST['id']));
$product = UserTable::get_product_by_id($_POST['id_product']);
$suppliers = UserTable::get_all_suppliers();
?>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/Lr6/product.php">Продукты</a>
            </li>
            <li class="breadcrumb-item active">
                Редактировать продукт <?= $product['0']['name'] ?>
            </li>
        </ol>
    </nav>

    <div class="row">
        <h2>Редактировать продукт</h2>
    </div>
    <form class="row row-cols-lg-auto g-3 align-items-center" method="POST" enctype="multipart/form-data">
        <div class="col-4">
            <input type="hidden" class="form-control" name="id" value="<?= $_POST['id_product'] ?>">
            <input type="text" class="form-control" placeholder="Название товара" name="setProductName" value="<?= $product['0']['name'] ?>">
        </div>
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Описание" name="setProductDescription" value="<?= $product['0']['description'] ?>">
        </div>
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Стоимость товара" name="setProductPrice" value="<?= $product['0']['cost'] ?>">
        </div>
        <div class="col-4">
            <input type="file" class="form-control" name="setProductPhoto">
        </div>
        <div class="col-4">
            <select class="form-select" name="setProductSupplier">
                <option value>Бренд</option>
                <?php
                foreach ($suppliers as $supplier) {
                    if ($supplier['id'] == $product['0']['id_supplier']) {
                        echo "<option selected value=" . $supplier['id'] . ">" . $supplier['namesupplier'] . "</option>";
                    }
                    echo "<option value=" . $supplier['id'] . ">" . $supplier['namesupplier'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-4">
            <button class="btn btn-primary" name="update" type="submit">Отправить</button>
        </div>
    </form>
</div>