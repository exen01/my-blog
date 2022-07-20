<?php
include SITE_ROOT . "/app/database/db.php";

$statusMessage = [];

$users = select('users');

function userAuth($userData, bool $isAdminPanel = false)
{
    if ($isAdminPanel) {
        header('location: ' . BASE_URL . "admin/users/index.php");
    } else {
        $_SESSION['id'] = $userData['id'];
        $_SESSION['login'] = $userData['username'];
        $_SESSION['isAdmin'] = $userData['is_admin'];

        if ($_SESSION['isAdmin']) {
            header('location: ' . BASE_URL . "admin/posts/index.php");
        } else {
            header('location: ' . BASE_URL);
        }
    }
}

function userAdd(string $from)
{
    $statusMessage = [];
    $isAdminPanel = $from === 'create';
    $isUpdate = $from === 'update';

    if ($isAdminPanel || $isUpdate) {
        $isAdmin = isset($_POST['admin']) ? 1 : 0;
    } else {
        $isAdmin = 0;
    }

    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passwordF = trim($_POST['passwordFirst']);
    $passwordS = trim($_POST['passwordSecond']);

    if ($login === "" || $email === "" || $passwordF === "") {
        array_push($statusMessage, "Не все поля заполнены.");
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($statusMessage, "Логин должен быть более 2-х символов.");
    } elseif ($passwordF !== $passwordS) {
        array_push($statusMessage, "Проверьте подтверждение пароля.");
    } elseif (!$isUpdate) {
        $userDataFromDb = select('users', ['email' => $email], true);
        if (!empty($userDataFromDb['email']) && $userDataFromDb['email'] === $email) {
            array_push($statusMessage, "Пользователь с данным адресом элекронной почты уже зарегестрирован.");
        }
    }

    if (empty($statusMessage)) {
        $pass = password_hash($passwordF, PASSWORD_DEFAULT);
        $user = [
            'is_admin' => $isAdmin,
            'username' => $login,
            'email' => $email,
            'password' => $pass
        ];

        if ($isUpdate) {
            update('users', $_POST['id'], $user);
            header('location: ' . BASE_URL . "admin/users/index.php");
        } else {
            $id = insert('users', $user);
            userAuth($user, $isAdminPanel);
        }
    }

    return $statusMessage;
}

// add user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['button-reg'])) {
        $statusMessage = userAdd('reg');
    } elseif (isset($_POST['create-user'])) {
        $statusMessage = userAdd('create');
    } elseif (isset($_POST['update-user'])) {
        $statusMessage = userAdd('update');
    }
} else {
    $login = '';
    $email = '';
}

//authorization
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-auth'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email === "" || $password === "") {
        array_push($statusMessage, "Не все поля заполнены.");
    } else {
        $userDataFromDb = select('users', ['email' => $email], true);
        if ($userDataFromDb && password_verify($password, $userDataFromDb['password'])) {
            userAuth($userDataFromDb);
        } else {
            array_push($statusMessage, "Неверная почта или пароль.");
        }
    }
} else {
    $email = '';
}

// user delete
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . BASE_URL . "admin/users/index.php");
}

// user update
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    $user = select('users', ['id' => $_GET['edit_id']], true);

    $id = $user['id'];
    $login = $user['username'];
    $email = $user['email'];
    $isAdmin = $user['is_admin'];
}
