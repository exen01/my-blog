<?php if (count($statusMessage) > 0) : ?>
    <ul>
        <?php foreach ($statusMessage as $error) : ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>