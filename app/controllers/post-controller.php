<?php

include SITE_ROOT . "/app/database/db.php";
if (!$_SESSION) {
    header('location: ' . BASE_URL . 'auth.php');
}

$statusMessage = [];
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
    //var_dump($value);
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
            array_push($statusMessage, "Загружаемый файл не является изображением.");
        } else {
            $result = move_uploaded_file($tmpFileName, $destination);
            if ($result) {
                $_POST['picture'] = $imgName;
            } else {
                array_push($statusMessage, "Ошибка загрузки изображения на сервер.");
            }
        }
    } else {
        array_push($statusMessage, "Ошибка получения изображения.");
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic_id = trim($_POST['topic_id']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if ($title === "" || $content === "" || $topic_id === "") {
        array_push($statusMessage, "Не все поля заполнены.");
    } elseif (mb_strlen($title, 'UTF8') < 7) {
        array_push($statusMessage, "Заголовок поста должен быть более 7-ми символов.");
    } elseif (empty($statusMessage)) {
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
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic_id = '';
}

// post update
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = select('posts', ['id' => $_GET['id']], true);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic_id = $post['id_topic'];
    $publish = $post['status'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-update'])) {
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic_id = trim($_POST['topic_id']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if (!empty($_FILES['picture']['name'])) {
        $imgName = time() . "_" . $_FILES['picture']['name'];
        $tmpFileName = $_FILES['picture']['tmp_name'];
        $fileType = $_FILES['picture']['type'];
        $destination = ROOT_PATH . "\assets\images\posts\\" . $imgName;

        if (strpos($fileType, 'image') === false) {
            array_push($statusMessage, "Загружаемый файл не является изображением.");
        } else {
            $result = move_uploaded_file($tmpFileName, $destination);
            if ($result) {
                $_POST['picture'] = $imgName;
            } else {
                array_push($statusMessage, "Ошибка загрузки изображения на сервер.");
            }
        }
    } else {
        array_push($statusMessage, "Ошибка получения изображения.");
    }

    if ($title === "" || $content === "" || $topic_id === "") {
        array_push($statusMessage, "Не все поля заполнены.");
    } elseif (mb_strlen($title, 'UTF8') < 7) {
        array_push($statusMessage, "Заголовок поста должен быть более 7-ми символов.");
    } elseif (empty($statusMessage)) {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'picture' => $_POST['picture'],
            'status' => $publish,
            'id_topic' => $topic_id
        ];
        update('posts', $id, $post);
        header('location: ' . BASE_URL . "admin/posts/index.php");
    }
}

// post delete
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('location: ' . BASE_URL . "admin/posts/index.php");
}

// post publish
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $status = $_GET['publish'];

    $postId = update('posts', $id, ['status' => $status]);

    header('location: ' . BASE_URL . "admin/posts/index.php");
    exit();
}
