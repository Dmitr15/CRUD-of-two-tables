<?php
class DataAction
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
        $sql = "SELECT product.name, supplier.namesupplier FROM `product`, `supplier` WHERE supplier.id= product.id_supplier;";
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

    public static function add_supplier(string $name)
    {
        $query = Database::prepare("INSERT INTO `supplier` (`namesupplier`) VALUES (:name)");

        $query->bindValue(":namesupplier", $name);

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
}
