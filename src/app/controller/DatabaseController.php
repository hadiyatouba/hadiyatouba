<?php

namespace Src\app\controller;

use Src\core\database\MysqlDatabase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatabaseController extends controller
{
    /**
     * @Route("/database", name="database")
     */
    public function index(MysqlDatabase $db): Response
    {
        // Exécution d'une requête simple
        $sql = "SELECT * FROM users";
        $result = $db->query($sql);

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row['username'];
        }

        return new Response('Users: ' . implode(', ', $users));
    }
}
