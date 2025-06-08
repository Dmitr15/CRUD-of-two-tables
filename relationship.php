<?php
error_reporting(E_ERROR | E_PARSE);

require_once("core.php");
require_once('head.php');

$relationships = UserTable::get_all_relationship();
?>

<div class="container">
    <div class="row">
        <h2>Список связей</h2>
    </div>

    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>id</th>
                <th>Название товара</th>
                <th>Производитель</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($relationships as $relationship): ?>
                <tr>
                    <th><?= $relationship['id'] ?></th>
                    <th><?= $relationship['name'] ?></th>
                    <th><?= $relationship['namesupplier'] ?></th>
                    <!-- <td><a class="btn btn-primary" type="button" href="#">Редактировать</a></td>
                    <td><a class="btn btn-danger delete">Удалить</a></td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- <a class="btn btn-primary" type="button" href="#">Добавить</a> -->
</div>