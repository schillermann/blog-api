<?php

use Blog\Database;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

Database::setConnection('blog', 'blog', 'password', '172.18.0.2');
var_dump(Database::getConnection());