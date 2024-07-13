<?php
namespace Src\core;

class Controller {
    protected $app;
    protected $database;
    protected $session;
    protected $authorize;
    protected $file;
    protected $validator;

    public function __construct($database, $app, $session, $authorize, $file, $validator) {
        $this->session = $session;
        $this->authorize = $authorize;
        $this->file = $file;
        $this->validator = $validator;
    }

    public function renderView($view, $data = []) {
        extract($data);
        require $view;
    }

    public function redirect($url) {
        header("Location: $url");
        exit();
    }

    public function toJson($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function fromJson() {
        return json_decode(file_get_contents('php://input'), true);
    }
}


