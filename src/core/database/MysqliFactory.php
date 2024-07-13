<?php
namespace Src\core\database;

class MysqliFactory
{
    public function createMysqli(string $host, string $user, string $pass, string $dbname): \mysqli
    {
        $mysqli = new \mysqli($host, $user, $pass, $dbname);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        return $mysqli;
    }
}
