<?php

class DataAction
{

    public static function get_all_products()
    {
        $query = Database::prepare("SELECT * from `product`");
        $query->execute();
        $products = $query->fetchAll();

        return $products;
    }

    public static function get_all_suppliers()
    {
        $query = Database::prepare("SELECT * from `supplier`");
        $query->execute();
        $products = $query->fetchAll();

        return $products;
    }

    public static function get_all_relationship()
    {
        $sql = "SELECT product.name, supplier.namesupplier FROM `product`, `supplier` WHERE supplier.id= product.id_supplier;";
        $query = Database::prepare($sql);
        $query->execute();
        $products = $query->fetchAll();

        return $products;
    }

    public static function add_product(string $sql, array $filters): array
    {
        $query = Database::prepare($sql);
        foreach ($filters as $k => $v) {
            $query->bindValue($k, $v);
        }
        $query->execute();
        $products = $query->fetchAll();

        return $products;
    }

    public static function add_supplier(string $sql, array $filters): array
    {
        $query = Database::prepare($sql);
        foreach ($filters as $k => $v) {
            $query->bindValue($k, $v);
        }
        $query->execute();
        $products = $query->fetchAll();

        return $products;
    }

    public static function add_relationship(string $sql, array $filters): array
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
