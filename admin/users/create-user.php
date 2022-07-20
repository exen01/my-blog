<?php
include "../../path.php";
include "../../app/controllers/user-controller.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My blog</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/68f611dc6c.js" crossorigin="anonymous"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="../../assets/css/admin.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <?php include "../../app/include/admin-header.php"; ?>

    <div class="container">
        <div class="row">
            <?php include "../../app/include/admin-sidebar.php"; ?>
            <div class="posts col-9">
                <div class="button row">
                    <a href="<?php echo BASE_URL . "admin/users/create-user.php"; ?>" class="col-2 btn btn-success">
                        Создать
                    </a>
                    <span class="col-1"></span>
                    <a href="<?php echo BASE_URL . "admin/users/index.php"; ?>" class="col-3 btn btn-warning">
                        Редактировать
                    </a>
                </div>
                <div class="row title-table">
                    <h2>Создание пользователя</h2>
                </div>
                <div class="row add-post">
                    <div class="mb-12 col-12 col-md-12 error">
                        <!-- Вывод массива ошибок -->
                        <?php include "../../app/helps/error-info.php"; ?>
                    </div>
                    <form action="create-user.php" method="post">
                        <div class="col mb-2">
                            <label for="formGroupExampleInput" class="form-label">Логин</label>
                            <input type="text" value="<?= $login; ?>" class="form-control" id="formGroupExampleInput" placeholder="Введите логин..." name="login">
                        </div>
                        <div class="col mb-2">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" value="<?= $email; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите email..." name="email">
                        </div>
                        <div class="col mb-2">
                            <label for="exampleInputPassword1" class="form-label">Пароль</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль..." name="passwordFirst">
                        </div>
                        <div class="col mb-2">
                            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторите пароль..." name="passwordSecond">
                        </div>
                        <div class="form-check mb-2">
                            <input name="admin" value="1" class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Admin?
                            </label>
                        </div>
                        <div class="col">
                            <button name="create-user" class="btn btn-primary" type="submit">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "../../app/include/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>