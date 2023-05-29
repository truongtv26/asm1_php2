<?php

namespace models;

use core\Database;

class Product extends Database
{
    private object $conn;

    public function __construct()
    {
        $this->conn = new Database();
    }

    public function listProduct() {
        $sql = "SELECT * FROM product";
        return $this->conn->getAll($sql);
    }

    public function detailProduct($id = 0) {
        $sql = "SELECT * FROM product WHERE id='$id'";
        return $this->conn->get($sql);
    }

    public function insertProduct($data = []) {

        if (!empty($data)) {
            $field = '';
            $value = '';
            foreach ($data as $key => $v) {
                $field .= "`$key`,";
                $value .= "'$v',";

            }

            $sql = "INSERT INTO product(".rtrim($field, ',').") VALUES (".rtrim($value, ',').")";
            $stmt = $this->conn->query($sql);
            if ($stmt)
                return true;
        }

        return false;
    }
    public function updateProduct($id, $data = []) {
        if (!empty($data)) {
            $set = '';
            foreach ($data as $key => $v) {
                $set .= "`$key`='$v',";

            }
            $sql = "UPDATE product SET ".rtrim($set, ',')." WHERE id='$id'";
            $stmt = $this->conn->query($sql);
            if ($stmt)
                return true;
        }

        return false;
    }
    public function deleteProduct($id) {
        $sql = "DELETE FROM product WHERE `id` ='$id'";
        $stmt = $this->conn->query($sql);
        if ($stmt)
            return true;
        return false;
    }


}