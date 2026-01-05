<?php
namespace App\Core;
class Database {
    private static $connection = null;
    private function __construct($host, $dbName, $username, $password) {
        self::$connection = new \PDO("mysql:host=$host;dbname=$dbName", $username, $password);
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    public static function getInstance() {
        if (self::$connection === null) {
             new self("mysql", "gestioneBlog", "root", "root");
        }
        return self::$connection;
    }
}