<?php
namespace Src\app\controller;



 use Src\core\database\MysqlDatabase; 

class ClientController {
    private $database;

    public function __construct(MysqlDatabase $database) {
        $this->database = $database;
    }

    public function add() {
        // Code pour afficher le formulaire d'ajout de client
        echo "Add Client Page";
    }

    public function list() {
        // Code pour lister les clients
        echo "List Client Page";
    }

    public function store() {
        // Code pour stocker les données du client
        echo "Store Client Data";
    }
}
