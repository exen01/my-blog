<?php
include "path.php";
include SITE_ROOT . "/app/database/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])) {
    $posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
}

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
            <div class="main-content col-12">
                <h2>Результаты поиска</h2>
                <?php if (!empty($posts)) : ?>
                    <?php foreach ($posts as $post) : ?>
                        <div class="post row">
                            <div class="img col-12 col-md-4">
                                <img src="<?= BASE_URL . 'assets/images/posts/' . $post['picture'] ?>" alt="<?= $post['title'] ?>" class="img-thumbnail" />
                            </div>
                            <div class="post-text col-12 col-md-8">
                                <h3>
                                    <a href="<?= BASE_URL . 'single.php?post=' . $post['id'] ?>"><?= mb_substr($post['title'], 0, 80, 'UTF-8') . '...' ?></a>
                                </h3>
                                <i class="far fa-user"> <?= $post['username'] ?></i>
                                <i class="far fa-calendar"> <?= $post['created_date'] ?></i>
                                <p class="preview-text">
                                    <?= mb_substr($post['content'], 0, 55, 'UTF-8') . '...' ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div>
                        <p>Ничего не найдено</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Main block end -->

    <?php include("app/include/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>