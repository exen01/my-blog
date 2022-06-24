<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация | My blog</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/68f611dc6c.js" crossorigin="anonymous"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1>
                        <a href="/">My blog</a>
                    </h1>
                </div>
                <nav class="col-8">
                    <ul>
                        <li><a href="#">Главная</a></li>
                        <li><a href="#">О нас</a></li>
                        <li><a href="#">Услуги</a></li>
                        <li>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                Кабинет
                            </a>
                            <ul>
                                <li><a href="#">Админ панель</a></li>
                                <li><a href="#">Выход</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- FORM start -->
    <div class="container reg-form">
        <form class="row justify-content-center" method="post" action="auth.html">
            <h2 class="col-12">Авторизация</h2>
            <div class="mb-3 col-12 col-md-4">
                <label for="formGroupExampleInput" class="form-label">Логин</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="введите ваш логин...">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="введите ваш пароль...">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <button type="submit" class="btn btn-secondary">Войти</button>
                <a href="auth.html">Регистрация</a>
            </div>
        </form>
    </div>
    <!-- FORM end -->


    <!-- Footer start -->
    <div class="footer container-fluid">
        <div class="footer-content container">
            <div class="row">
                <div class="footer-section about col-md-4 col-12">
                    <h3 class="logo-text">My blog</h3>
                    <p>
                        Мой блог - это блог созданный в рамках обучающего курса "Динамический сайт"
                        с целью изучения HTML, CSS, JS, PHP.
                    </p>
                    <div class="contact">
                        <span><i class="fas fa-phone"></i> &nbsp; 123-456-789</span>
                        <span><i class="fas fa-envelope"></i> &nbsp; info@myblog.com</span>
                    </div>
                    <div class="socials">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section links col-md-4 col-12">
                    <h3>Quick Links</h3>
                    <br>
                    <ul>
                        <a href="#">
                            <li>События</li>
                        </a>
                        <a href="#">
                            <li>Команда</li>
                        </a>
                        <a href="#">
                            <li>Упражнения</li>
                        </a>
                        <a href="#">
                            <li>Галлерея</li>
                        </a>
                        <a href="#">
                            <li>Что-то ещё</li>
                        </a>
                    </ul>
                </div>
                <div class="footer-section contact-form col-md-4 col-12">
                    <h3>Контакты</h3>
                    <br>
                    <form action="#" method="post">
                        <input type="email" name="email" class="text-input contact-input"
                            placeholder="Your email address..." />
                        <textarea rows="4" name="message" class="text-input contact-input"
                            placeholder="Your message..."></textarea>
                        <button type="submit" class="btn btn-big contact-btn">
                            <i class="fas fa-envelope"></i>
                            Отправить
                        </button>

                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; myblog.com | Designed by Andrievskii
            </div>
        </div>
    </div>
    <!-- Footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>