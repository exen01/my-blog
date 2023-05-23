<?php
include("path.php");
include SITE_ROOT . "/app/database/db.php";

$post = selectPostWithUser('posts', 'users', $_GET['post']);
?>

<!DOCTYPE html>
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
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include("app/include/header.php"); ?>

    <!-- Main block start -->
    <div class="container">
        <div class="content row">
            <!-- Main Content -->
            <div class="main-content col-md-9 col-12">
                <h2>
                    <?php echo $post['title']; ?>
                </h2>
                <div class="single-post row">
                    <div class="img col-12">
                        <img src="<?= BASE_URL . 'assets/images/posts/' . $post['picture'] ?>" alt="<?= $post['title'] ?>" class="img-thumbnail" />
                    </div>
                    <div class="info">
                        <i class="far fa-user"><?= $post['username']; ?></i>
                        <i class="far fa-calendar"><?= $post['created_date']; ?></i>
                    </div>
                    <div class="single-post-text col-12">
                        <?= $post['content']; ?>
                    </div>
                </div>
            </div>
            <!-- Sidebar Content -->
            <div class="sidebar col-md-3 col-12">
                <div class="section search">
                    <h3>Поиск</h3>
                    <form action="/" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово..." />
                    </form>
                </div>
                <div class="section topics">
                    <h3>Категории</h3>
                    <ul>
                        <li><a href="#">Программирование</a></li>
                        <li><a href="#">Дизайн</a></li>
                        <li><a href="#">Визуализация</a></li>
                        <li><a href="#">Кейсы</a></li>
                        <li><a href="#">Мотивация</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main block end -->

    <?php include("app/include/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>