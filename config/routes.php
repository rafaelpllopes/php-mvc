<?php


return [
    'GET|/' => Mvc\Controller\VideoListController::class,
    'GET|/novo-video' => Mvc\Controller\VideoFormController::class,
    'POST|/novo-video' => Mvc\Controller\NewVideoController::class,
    'GET|/editar-video' => Mvc\Controller\VideoFormController::class,
    'POST|/editar-video' => Mvc\Controller\EditVideoController::class,
    'GET|/remover-video' => Mvc\Controller\DeleteVideoController::class
];