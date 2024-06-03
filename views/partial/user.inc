<?php if(!isset($data)): ?>
    <nav class="navbar-nav">
        <?php $link('Login', 'User', 'LogIn', cssClass: 'nav-link') ?>
    </nav>
<?php else: ?>
    <?php $beginForm('User', 'LogOut', method: 'post', cssClass: 'form-inline'); ?>
        <span class="navbar-text me-2">Welcome, <strong><?php $htmlOut($data->userName); ?></strong></span>
        <button class="btn btn-secondary">Log out</button>
    <?php $endForm(); ?>
<?php endif; ?>
