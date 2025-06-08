<?php
class UserTable
{
    public static function get_all_products(): array
    {
        $query = Database::prepare("SELECT * from `product`");
        $query->execute();
        $products = $query->fetchAll();

        return $products;
    }

    public static function get_all_suppliers(): array
    {
        $query = Database::prepare("SELECT * from `supplier`");
        $query->execute();
        $products = $query->fetchAll();

        return $products;
    }

    public static function get_all_relationship(): array
    {
        $sql = "SELECT product.id, product.name, supplier.namesupplier FROM `product`, `supplier` WHERE supplier.id= product.id_supplier;";
        $query = Database::prepare($sql);
        $query->execute();
        $products = $query->fetchAll();

        return $products;
    }

    public static function add_product(string $img_path, string $name, int $supplier, string $description, int $cost)
    {
        $query = Database::prepare("INSERT INTO `product` (`img_path`, `name`, `id_supplier`, `description`, `cost`) VALUES (:img_path, :name, :supplier, :description, :cost)");

        $query->bindValue(":img_path", $img_path);
        $query->bindValue(":name", $name);
        $query->bindValue(":supplier", $supplier);
        $query->bindValue(":description", $description);
        $query->bindValue(":cost", $cost);

        if (!$query->execute()) {
            throw new PDOException('Exception while adding a new product');
        }
    }

    public static function add_supplier(string $namesupplier)
    {
        $query = Database::prepare("INSERT INTO `supplier` (`namesupplier`) VALUES (:name)");

        $query->bindValue(":name", $namesupplier);

        if (!$query->execute()) {
            throw new PDOException('Exception while adding a new supplier');
        }
    }

    public static function add_relationship(string $sql, array $filters)
    {
        $query = Database::prepare($sql);
        foreach ($filters as $k => $v) {
            $query->bindValue($k, $v);
        }
        $query->execute();
        $products = $query->fetchAll();

        return $products;
    }

    public static function delete_supplier()
    {
        if ('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['del'])) {
            $del_id = intval($_POST['id_supplier']);
            $sql = "DELETE FROM `supplier` WHERE supplier.id =" . $del_id.";";
            $query = Database::prepare($sql);
            $query->execute();
            //UserTable::delete_supplier_from_all_products($del_id);
            header("Location: http://localhost/Lr6/supplier.php");
        }
    }

    public static function delete_product()
    {
        if ('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['del'])) {
            $sql = "DELETE FROM `product` WHERE product.id =" . $_POST['id_product'];
            $query = Database::prepare($sql);
            $query->execute();
            header("Location: http://localhost/Lr6/product.php");
        }
    }


    public static function get_product_by_id(int $id): array
    {
        $sql = "SELECT product.img_path, product.name, product.id_supplier, product.description, product.cost FROM `product` WHERE product.id=" . $id . ";";
        $query = Database::prepare($sql);
        $query->execute();
        $product = $query->fetchAll();

        return $product;
    }

    public static function get_supplier_by_id(int $id)
    {
        $sql = "SELECT supplier.namesupplier FROM supplier WHERE supplier.id =" . $id . ";";
        $query = Database::prepare($sql);
        $query->execute();
        $supplier = $query->fetchAll();

        return $supplier;
    }

    public static function edit_product(int $id, string $img_path, string $name, int $supplier, string $description, int $cost)
    {
        $query = Database::prepare("UPDATE `product` SET img_path = :img, name = :name, id_supplier = :supplier, description = :description, cost = :cost WHERE id = :id");

        $query->bindValue(":img", $img_path);
        $query->bindValue(":name", $name);
        $query->bindValue(":supplier", $supplier);
        $query->bindValue(":description", $description);
        $query->bindValue(":cost", $cost);
        $query->bindValue(":id", $id);

        if (!$query->execute()) {
            throw new PDOException('Exception while adding a new product');
        }
    }

    public static function edit_supplier(int $id, string $name)
    {
        $query = Database::prepare("UPDATE `supplier` SET namesupplier = :name WHERE id = :id");

        $query->bindValue(":name", $name);
        $query->bindValue(":id", $id);

        if (!$query->execute()) {
            throw new PDOException('Exception while adding a new product');
        }
    }
}
