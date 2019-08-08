<?php
namespace Blog;

interface DatabaseInterface
{
    static function setConnection(string $database, string $username, string $password, string $host): bool;

    static function getConnection(): \Pdo;
}