<?php
session_start();
include "../../path.php";
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
                    <form action="create-post.php" method="post">
                        <div class="col">
                            <label for="formGroupExampleInput" class="form-label">Логин</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="введите ваш логин..." name="login">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш email..." name="email">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Пароль</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="введите ваш пароль..." name="passwordFirst">
                        </div>
                        <div class="col-12">
                            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="повторите ваш пароль..." name="passwordSecond">
                        </div>
                        <div>
                            <label for="role" class="form-label">Права пользователя</label>
                            <select class="form-select" aria-label="Default select example" id="role">
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" type="submit">Создать</button>
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