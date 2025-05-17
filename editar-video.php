<?php 

    $dbPath = __DIR__ . '/banco.sqlite';    
    $pdo = new PDO("sqlite:{$dbPath}");

    $video = [
        "url" => '',
        "title" => ''
    ];

    $id = filter_input(INPUT_GET, 'id');
    $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
    $title = filter_input(INPUT_POST, 'titulo');

    if ($id === false) {
        header('Location: /index.php?sucesso=0');
        exit();
    }

    if ($url === false) {
        header('Location: /index.php?sucesso=0');
        exit();
    }

    if ($title === false) {
        header('Location: /index.php?sucesso=0');
        exit();
    }

    $sqlUpdate = 'UPDATE videos SET url = ?, title = ? WHERE id = ?;';
    $stmt = $pdo->prepare($sqlUpdate);
    $stmt->bindValue(1, $url);
    $stmt->bindValue(2, $title);
    $stmt->bindValue(3, $id);
    
    if ($stmt->execute() === false) {
        header('Location: /index.php:sucesso=0');
    } else {
        header('Location: /index.php:sucesso=1');
    }