<?php
namespace Src\app;


use Src\core\database\MysqlDatabase;

class App {
    private static $instance = null;
    private $database;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setDatabase(MysqlDatabase $database) {
        $this->database = $database;
    }

    public static function getDatabase() {
        return self::getInstance()->database;
    }

    public static function getModel($model) {
        require_once "models/{$model}.php";
        $modelClass = ucfirst($model);
        return new $modelClass(self::getDatabase());
    }

    public static function getSecurityDB() {
        return self::getDatabase(); // Assuming this returns the same database instance
    }
}





