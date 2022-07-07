<?php
include "../../path.php";
include "../../app/controllers/post-controller.php";
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
                <div class="row title-table">
                    <h2>Редактирование записи</h2>
                </div>
                <div class="row add-post">
                    <div class="mb-12 col-12 col-md-12 error">
                        <!-- Вывод массива ошибок -->
                        <?php include "../../app/helps/error-info.php"; ?>
                    </div>
                    <form action="edit-post.php" method="post" enctype="multipart/form-data">
                        <input name="id" type="hidden" value="<?= $id; ?>">
                        <div class="col mb-4">
                            <label for="title" class="form-label">Название статьи</label>
                            <input name="title" value="<?= $title; ?>" type="text" class="form-control" placeholder="Title" id="title">
                        </div>
                        <div class="col mb-4">
                            <label for="editor" class="form-label">Содержимое статьи</label>
                            <textarea name="content" class="form-control" id="editor" rows="6"><?= $content; ?></textarea>
                        </div>
                        <div class="input-group col mb-4">
                            <input name="picture" type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <select name="topic_id" class="form-select mb-2">
                            <?php foreach ($topics as $key => $topic) : ?>
                                <option value="<?= $topic['id'] ?>"><?= $topic['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-check mb-2">
                            <?php if (empty($publish) || $publish === 0) : ?>
                                <input name="publish" class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Publish
                                </label>
                            <?php else : ?>
                                <input name="publish" class="form-check-input" value="1" type="checkbox" id="gridCheck" checked>
                                <label class="form-check-label" for="gridCheck">
                                    Publish
                                </label>
                            <?php endif; ?>
                        </div>
                        <div class="col col-6">
                            <button name="post-update" class="btn btn-primary" type="submit">Сохранить пост</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "../../app/include/footer.php"; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Bootstrap CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <!-- Custom script -->
    <script src="../../assets/js/script.js"></script>
</body>

</html>