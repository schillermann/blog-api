<?php
namespace FuncApi;

class Services
{
    protected static $database;
    protected static $containers;

    static function setDatabase(DatabaseInterface $database): bool
    {
        if(self::$database) return false;

        self::$database = $database;
        return true;
    }

    static function getDatabase(): DatabaseInterface
    {
        return self::$database;
    }

    static function setContainer(string $name, $content)
    {
        if(self::$containers[$name]) return false;

        self::$containers[$name] = $content;
        return true;
    }

    static function getContainer(string $name)
    {
        return self::$containers[$name];
    }
}