<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i < $totalPages; $i++) : ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item">
            <a class="page-link" href="?page=<?= $totalPages ?>">Last</a>
        </li>
    </ul>
</nav>