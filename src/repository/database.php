<?php

namespace Src\Repository;

use PDO;

class Database
{
    public static function connect(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'admin', 'admin');
    }
}
