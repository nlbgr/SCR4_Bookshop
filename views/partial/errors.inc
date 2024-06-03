<div class="alert alert-danger">
    <p>
        Please correct the following and try again:
    </p>
    <ul>
        <?php foreach ($data as $errMsg): ?>
            <li><?php $htmlOut($errMsg); ?></li>
        <?php endforeach; ?>
    </ul>
</div>