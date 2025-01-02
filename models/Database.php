<?php


namespace Model;

require_once 'config.php';
use \PDO;

final class Database {

    private $connection;

    public function __construct() {
        $this->connection = new PDO("mysql:host=" . HOST . ";dbname=" . BASE, USER, PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function select($query, $binds = []) {
        $stmt = $this->connection->prepare($query);

        foreach($binds as $i => $bind) {
            $stmt->bindValue($i, $bind);
        }

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function execute($query, $binds = []) {
        $stmt = $this->connection->prepare($query);

        foreach($binds as $i => $bind) {
            $stmt->bindValue($i, $bind);
        }

        return $stmt->execute();
    }

    public function getLastInsertedId() {
        return $this->connection->lastInsertId();
    }

    public function __destruct() {
        $this->connection = null;
    }

}