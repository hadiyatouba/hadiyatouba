<?php
namespace Src\core\database;

class MysqlDatabase
{
    private $connection;

    public function __construct(string $host, string $user, string $pass, string $dbname)
    {
        $this->connection = new \mysqli($host, $user, $pass, $dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        echo "Connection successful";
    }

    public function query($sql)
    {
        $result = $this->connection->query($sql);

        if ($this->connection->error) {
            die("Query failed: " . $this->connection->error);
        }

        return $result;
    }

    public function prepare($sql)
    {
        $stmt = $this->connection->prepare($sql);

        if ($this->connection->error) {
            die("Prepare failed: " . $this->connection->error);
        }

        return $stmt;
    }

    public function close()
    {
        $this->connection->close();
    }
}
