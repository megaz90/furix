<?php

namespace App\core\database;

use Exception;
use PDO;

class Connection
{
    public static function make($config)
    {
        try {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options'],
            );
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}
