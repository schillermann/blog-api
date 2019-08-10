<?php
namespace SimpleApi;

class TypeCheck
{
    static function is_datetime(string $dateTime): bool
    {
        try {
            new DateTime($dateTime);
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }
}