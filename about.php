<?php include "path.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>О нас | My blog</title>

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
                    О нас
                </h2>
                <div class="single-post row">
                    <div class="single-post-text col-12">
                        <p>
                            Задача <a href="#">организации</a>, в особенности же постоянное информационно-пропагандистское обеспечение
                            нашей деятельности в значительной степени обуславливает создание модели развития. Таким
                            образом укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в
                            формировании дальнейших направлений развития. Не следует, однако забывать, что постоянное
                            информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс
                            внедрения и модернизации модели развития. Повседневная практика показывает, что начало
                            повседневной работы по формированию позиции влечет за собой процесс внедрения и модернизации
                            соответствующий условий активизации. Идейные соображения высшего порядка, а также дальнейшее
                            развитие различных форм деятельности играет важную роль в формировании системы обучения
                            кадров, соответствует насущным потребностям.
                        </p>
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