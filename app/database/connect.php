<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'dynamic_site';
$db_user = 'root';
$db_password = 'root';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user,
        $db_password,
        $options
    );
} catch (PDOException $e) {
    die("Ошибка подключения к БД!");
}
