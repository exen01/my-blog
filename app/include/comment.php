<?php
include SITE_ROOT . "/app/controllers/comment-controller.php";
?>

<div class="col-md-12 col-12 comments">
    <h3>Оставить комментарий</h3>
    <form action="<?= BASE_URL . "single.php?post=" . $pageId ?>" method="POST">
        <input type="hidden" name="pageId" value="<?= $pageId ?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email адрес</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Напишите ваш отзыв</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="col-12 mb-3">
            <button type="submit" name="comment-create" class="btn btn-primary">
                Отправить
            </button>
        </div>
    </form>
    <h3>Комменатрии</h3>

</div>