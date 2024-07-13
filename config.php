<?php

require_once '../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__));
$loader->load('services.yaml');

// Récupération de l'instance App via le container
$app = $container->get('app');

// Maintenant, vous pouvez utiliser $app comme instance de la classe App
