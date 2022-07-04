<?php

include SITE_ROOT . "/app/database/db.php";

$statusMessage = "";
$id = '';
$name = '';
$description = '';

$topics = select('topics');

// topic create
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name === "" || $description === "") {
        $statusMessage = "Не все поля заполнены.";
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        $statusMessage = "Название категории должно быть более 2-х символов.";
    } else {
        $topicDataFromDb = select('topics', ['name' => $name], true);
        if (!empty($topicDataFromDb['name']) && $topicDataFromDb['name'] === $name) {
            $statusMessage = "Категория с данным названием уже существует.";
        } else {
            $topic = [
                'name' => $name,
                'description' => $description
            ];
            $id = insert('topics', $topic);
            header('location: ' . BASE_URL . "admin/topics/index.php");
        }
    }
} else {
    $name = '';
    $description = '';
}

// topic update
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $topic = select('topics', ['id' => $id], true);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-update'])) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name === "" || $description === "") {
        $statusMessage = "Не все поля заполнены.";
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        $statusMessage = "Название категории должно быть более 2-х символов.";
    } else {
        $topic = [
            'name' => $name,
            'description' => $description
        ];
        $id = $_POST['id'];
        update('topics', $id, $topic);
        header('location: ' . BASE_URL . "admin/topics/index.php");
    }
}

// topic delete
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('topics', $id);
    header('location: ' . BASE_URL . "admin/topics/index.php");
}
