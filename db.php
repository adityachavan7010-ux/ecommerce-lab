<?php
class Database {
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->connection = new mysqli('localhost', 'root', '', 'ecommerce_lab');

        if ($this->connection->connect_error) {
            die('Connection failed: ' . $this->connection->connect_error);
        }
        $this->connection->set_charset('utf8');
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>