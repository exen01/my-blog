<?php
include SITE_ROOT . "/app/database/db.php";

$statusMessage = [];

function userAuth($userData)
{
    $_SESSION['id'] = $userData['id'];
    $_SESSION['login'] = $userData['username'];
    $_SESSION['isAdmin'] = $userData['is_admin'];

    if ($_SESSION['isAdmin']) {
        header('location: ' . BASE_URL . "admin/posts/index.php");
    } else {
        header('location: ' . BASE_URL);
    }
}

// registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $isAdmin = 0;
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
    } else {
        $userDataFromDb = select('users', ['email' => $email], true);
        if (!empty($userDataFromDb['email']) && $userDataFromDb['email'] === $email) {
            array_push($statusMessage, "Пользователь с данным адресом элекронной почты уже зарегестрирован.");
        } else {
            $pass = password_hash($passwordF, PASSWORD_DEFAULT);
            $user = [
                'is_admin' => $isAdmin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);
            userAuth($user);
        }
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
