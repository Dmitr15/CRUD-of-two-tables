<?php
error_reporting(E_ERROR | E_PARSE);

require_once("core.php");
require_once('head.php');

$suppliers = UserTable::get_all_suppliers();
UserTable::delete_supplier();

?>

<div class="container">
    <div class="row">
        <h2>Список поставщиков</h2>
    </div>

    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>id</th>
                <th>Название поставщика</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <th><?= $supplier['id'] ?></th>
                    <th><?= $supplier['namesupplier'] ?></th>
                    <td>
                        <form method="POST" action="/Lr6/editSupplier.php">
                            <input type="hidden" name="id_supplier" value="<?= $supplier['id'] ?>">
                            <button type="submit" name="edit" class="btn btn-primary">Редактировать</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="id_supplier" value="<?= $supplier['id'] ?>">
                            <button type="submit" name="del" class="btn btn-danger delete">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a class="btn btn-primary" type="button" href="/Lr6/supplierAdd.php">Добавить</a>
</div>