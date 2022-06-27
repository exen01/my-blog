<?php
include "app/database/db.php";

$statusMessage = "";

// function prettyPrint($value)
// {
//     echo '<pre>';
//     print_r($value);
//     echo '<pre>';
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isAdmin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passwordF = trim($_POST['passwordFirst']);
    $passwordS = trim($_POST['passwordSecond']);

    if ($login === "" || $email === "" || $passwordF === "") {
        $statusMessage = "Не все поля заполнены.";
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        $statusMessage = "Логин должен быть более 2-х символов.";
    } elseif ($passwordF !== $passwordS) {
        $statusMessage = "Проверьте подтверждение пароля.";
    } else {
        $emailFromDb = select('users', ['email' => $email], true);
        if (!empty($emailFromDb['email']) && $emailFromDb['email'] === $email) {
            $statusMessage = "Пользователь с данным адресом элекронной почты уже зарегестрирован.";
        } else {
            $pass = password_hash($passwordF, PASSWORD_DEFAULT);
            $post = [
                'is_admin' => $isAdmin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $statusMessage = "Пользователь $login успешно зарегестрирован.";
        }
    }
} else {
    $login = '';
    $email = '';
}
