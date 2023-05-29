<?php

namespace core;

class Database
{
    public static $instance = null;
    public static $db = null;
    public function __construct()
    {
        Database::$db = $this;
        if (self::$instance == null) {
            try {
                $host = 'localhost';
                $db = 'we18104';
                $user = 'root';
                $password = '';

                $options = [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ];

                $dsn = "mysql:dbname=$db;host=$host";
                self::$instance = new \PDO($dsn, $user, $password, $options);
                return self::$instance;

            } catch (\PDOException $e) {
                die($e->getMessage());
            }
        } else {
            return self::$instance;
        }
    }

    public function query($sql) {
        try {
            $stmt = self::$instance->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch(\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function get($sql) {
        return $this->query($sql)->fetch();

    }
    public function getAll($sql) {
        return $this->query($sql)->fetchAll();

    }
    public function getFieldFromTable($fetchMode = 0, $table,$field = '*', $condition = 1) {
        $sql = "SELECT $field FROM $table WHERE $condition";
        if ($fetchMode == 0)
            return $this->query($sql)->fetch();
        return $this->query($sql)->fetchAll();
    }

}