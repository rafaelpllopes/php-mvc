<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:{$dbPath}");

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, 'title');

if ($url === false) {
    header('Location: /index.php?sucesso=0');
    exit();
}

if ($title === false) {
    header('Location: /index.php?sucesso=0');
    exit();
}

$sql = 'INSERT INTO videos (url, title) VALUES (?, ?);';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $url);
$stmt->bindValue(2, $title);

if ($stmt->execute() === false) {
    header('Location: /index.php:sucesso=0');
} else {
    header('Location: /index.php:sucesso=1');
}