<?php
error_reporting(E_ERROR | E_PARSE);

require_once("core.php");
require_once('head.php');

$products = UserTable::get_all_products();
UserTable::delete_product();

?>

<div class="container">
    <div class="row">
        <h2>Список товаров</h2>
    </div>

    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>id</th>
                <th>Название товара</th>
                <th>Поставщик</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Картинка</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <th><?= $product['id'] ?></th>
                    <th><?= $product['name'] ?></th>
                    <th><?= $product['id_supplier'] ?></th>
                    <th><?= $product['description'] ?></th>
                    <th><?= $product['cost'] ?></th>
                    <th><img class="box_img img-fluid" src="img/<?= $product['img_path'] ?>" alt="box1"></th>
                    <td>
                        <form method="POST" action="/Lr6/editProduct.php">
                            <input type="hidden" name="id_product" value="<?= $product['id'] ?>">
                            <button type="submit" name="edit" class="btn btn-primary">Редактировать</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="id_product" value="<?= $product['id'] ?>">
                            <button type="submit" name="del" class="btn btn-danger delete">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a class="btn btn-primary" type="button" href="/Lr6/productAdd.php">Добавить</a>
</div>