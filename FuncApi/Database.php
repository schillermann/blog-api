<?php
namespace FuncApi;

class Database implements DatabaseInterface
{
    protected static $connection;
    protected static $username;
    protected static $password;
    protected static $host;

    static function setConnection(string $database, string $username, string $password, string $host = 'localhost'): bool
    {
        if(self::$connection) return false;

        $dsn = 'mysql:dbname=' . $database . ';host=' . $host;
        self::$connection = new \Pdo($dsn, $username, $password);
        return true;
    }

    static function getConnection(): \Pdo
    {
        return self::$connection;
    }

}