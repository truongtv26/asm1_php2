<?php

namespace models;

use core\Database;

class Customer extends Database
{
    public $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }

    public function listCustomer() {
        $sql = "SELECT * FROM customer";
        return $this->conn->getAll($sql);
    }

    public function detailCustomer($id = 0) {
        $sql = "SELECT * FROM customer WHERE id='$id'";
        return $this->conn->get($sql);
    }

    public function insertCustomer($data = []) {

        if (!empty($data)) {
            $field = '';
            $value = '';
            foreach ($data as $key => $v) {
                $field .= "`$key`,";
                $value .= "'$v',";

            }

            $sql = "INSERT INTO customer(".rtrim($field, ',').") VALUES (".rtrim($value, ',').")";
            $stmt = $this->conn->query($sql);
            if ($stmt)
                return true;
        }

        return false;
    }
    public function updateCustomer($id, $data = []) {
        if (!empty($data)) {
            $set = '';
            foreach ($data as $key => $v) {
                $set .= "`$key`='$v',";

            }
            $sql = "UPDATE customer SET ".rtrim($set, ',')." WHERE id='$id'";
            $stmt = $this->conn->query($sql);
            if ($stmt)
                return true;
        }

        return false;
    }

    public function deleteCustomer($id) {
        $sql = "DELETE FROM customer WHERE `id` ='$id'";
        $stmt = $this->conn->query($sql);
        if ($stmt)
            return true;
        return false;
    }
}