<?php
include "../../path.php";
include "../../app/controllers/user-controller.php"
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
                    <h2>Пользователи</h2>
                    <div class="col-1">ID</div>
                    <div class="col-2">Логин</div>
                    <div class="col-3">Email</div>
                    <div class="col-2">Роль</div>
                    <div class="col-4">Управление</div>
                </div>
                <?php foreach ($users as $key => $user) : ?>
                    <div class="row post">
                        <div class="col-1 id"><?= $user['id']; ?></div>
                        <div class="col-2"><?= $user['username']; ?></div>
                        <div class="col-3"><?= $user['email']; ?></div>
                        <div class="col-2"><?= $user['is_admin'] ? "Admin" : "User"; ?></div>
                        <div class="col-2 edit">
                            <a href="edit-user.php?edit_id=<?= $user['id']; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit
                            </a>
                        </div>
                        <div class="col-2 delete">
                            <a href="index.php?delete_id=<?= $user['id']; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                                Delete
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include "../../app/include/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>