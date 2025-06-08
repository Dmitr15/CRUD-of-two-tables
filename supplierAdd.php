<?php
error_reporting(E_ERROR | E_PARSE);

require_once("core.php");
require_once('head.php');

$errors = UserAction::addSupplier();
?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/Lr6/supplier.php">Поставщики</a>
            </li>
            <li class="breadcrumb-item active">
                Новый поставщик
            </li>
        </ol>
    </nav>

    <h1>Добавить поставщика</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger" role="alert"><?= $errors ?></div>
    <?php endif; ?>

    <form class="row row-cols-lg-auto g-3 align-items-center" method="POST">
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Имя поставщика" name="setSupplierName" value="<?= htmlspecialchars($_POST['setSupplierName']) ?>">
        </div>
        <div class="col-4">
            <button class="btn btn-primary" type="submit">Отправить</button>
        </div>
    </form>
</div>