<?php
// public/index.php
require_once '../config.php';

use App\Route;


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Ajouter vos routes
Route::get('/', ['HomeController', 'index']);
Route::get('/client/add', ['ClientController', 'add']);
Route::get('/client/list', ['ClientController', 'list']);
Route::post('/client/add', ['ClientController', 'store']);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
Route::dispatch($uri, $method);
