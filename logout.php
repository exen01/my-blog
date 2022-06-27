<?php
include "path.php";
session_start();

unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['isAdmin']);

header('location: ' . BASE_URL);