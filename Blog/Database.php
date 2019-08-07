<?php
namespace Blog;

class Database
{
    protected static $connection;
    protected static $username;
    protected static $password;
    protected static $host;

    static function setConnection(string $database, string $username, string $password, string $host = 'localhost')
    {
        $dsn = 'mysql:dbname=' . $database . ';host=' . $host;
        self::$connection = new \Pdo($dsn, $username, $password);
    }

    static function getConnection()
    {
        return self::$connection;
    }

}