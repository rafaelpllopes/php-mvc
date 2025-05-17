<?php

use Mvc\Controller\DeleteVideoController;
use Mvc\Controller\EditVideoController;
use Mvc\Controller\Error404Controller;
use Mvc\Controller\NewVideoController;
use Mvc\Controller\VideoFormController;
use Mvc\Controller\VideoListController;
use Mvc\Repository\VideoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    $controller = new VideoListController($videoRepository);
} elseif ($_SERVER['PATH_INFO'] === '/novo-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $controller = new VideoFormController($videoRepository);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                 $controller = new NewVideoController($videoRepository);
        }
} elseif ($_SERVER['PATH_INFO'] === '/editar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $controller = new VideoFormController($videoRepository);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new EditVideoController($videoRepository);
    }
} elseif ($_SERVER['PATH_INFO'] === '/remover-video') {
        $controller = new DeleteVideoController($videoRepository);
} else {
        $controller = new Error404Controller();
}
$controller->processaRequisicao();