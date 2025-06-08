<?php
error_reporting(E_ERROR | E_PARSE);

require_once("core.php");
require_once('head.php');

$suppliers = UserTable::get_all_suppliers();

$errors = UserAction::addProductField();
?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/Lr6/product.php">Список продуктов</a>
            </li>
            <li class="breadcrumb-item active">
                Новый продукт
            </li>
        </ol>
    </nav>

    <h1>Добавить продукт</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger" role="alert"><?= $errors ?></div>
    <?php endif; ?>

    <form class="row row-cols-lg-auto g-3 align-items-center" method="POST" enctype="multipart/form-data">
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Название товара" name="setProductName" value="<?= htmlspecialchars($_POST['setProductName']) ?>">
        </div>
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Описание" name="setProductDescription" value="<?= htmlspecialchars($_POST['setProductDescription']) ?>">
        </div>
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Стоимость товара" name="setProductPrice" value="<?= htmlspecialchars($_POST['setProductPrice']) ?>">
        </div>
        <div class="col-4">
            <input type="file" class="form-control" name="setProductPhoto">
        </div>
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
            <button class="btn btn-primary" type="submit">Отправить</button>
        </div>
    </form>
</div>