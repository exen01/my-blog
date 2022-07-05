<?php

include SITE_ROOT . "/app/database/db.php";
if (!$_SESSION) {
    header('location: ' . BASE_URL . 'auth.php');
}

$statusMessage = "";
$id = '';
$title = '';
$content = '';
$picture = '';
$topic_id = '';

$topics = select('topics');
//$posts = select('posts');
$posts = selectAllFromPostsWithUsers('posts', 'users');

function prettyPrint($value)
{
    echo '<pre>';
    print_r($value);
    echo '<pre>';
    exit();
}

// post create
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-create'])) {
    if (!empty($_FILES['picture']['name'])) {
        $imgName = time() . "_" . $_FILES['picture']['name'];
        $tmpFileName = $_FILES['picture']['tmp_name'];
        $fileType = $_FILES['picture']['type'];
        $destination = ROOT_PATH . "\assets\images\posts\\" . $imgName;

        if (strpos($fileType, 'image') === false) {
            die("Можно загружать только изображения.");
        } else {
            $result = move_uploaded_file($tmpFileName, $destination);
            if ($result) {
                $_POST['picture'] = $imgName;
            } else {
                $statusMessage = "Ошибка загрузки изображения на сервер.";
            }
        }
    } else {
        $statusMessage = "Ошибка получения изображения.";
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic_id = trim($_POST['topic_id']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if ($title === "" || $content === "" || $topic_id === "") {
        $statusMessage = "Не все поля заполнены.";
    } elseif (mb_strlen($title, 'UTF8') < 7) {
        $statusMessage = "Заголовок поста должен быть более 7-ми символов.";
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'picture' => $_POST['picture'],
            'status' => $publish,
            'id_topic' => $topic_id
        ];

        $id = insert('posts', $post);
        header('location: ' . BASE_URL . "admin/posts/index.php");
    }
} else {
    $title = '';
    $content = '';
}

// // topic update
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
//     $id = $_GET['id'];
//     $topic = select('topics', ['id' => $id], true);
//     $id = $topic['id'];
//     $name = $topic['name'];
//     $description = $topic['description'];
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-update'])) {
//     $name = trim($_POST['name']);
//     $description = trim($_POST['description']);

//     if ($name === "" || $description === "") {
//         $statusMessage = "Не все поля заполнены.";
//     } elseif (mb_strlen($name, 'UTF8') < 2) {
//         $statusMessage = "Название категории должно быть более 2-х символов.";
//     } else {
//         $topic = [
//             'name' => $name,
//             'description' => $description
//         ];
//         $id = $_POST['id'];
//         update('topics', $id, $topic);
//         header('location: ' . BASE_URL . "admin/topics/index.php");
//     }
// }

// // topic delete
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
//     $id = $_GET['delete_id'];
//     delete('topics', $id);
//     header('location: ' . BASE_URL . "admin/topics/index.php");
// }
