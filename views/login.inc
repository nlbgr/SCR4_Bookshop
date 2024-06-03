<?php $render('partial/header', $data); ?>

    <h1>Login</h1>

    <?php $beginForm('User', 'LogIn', method: 'post'); ?>
        <div class="mb-3">
            <label for="uesrName" class="form-label">User name</label>
            <input class="form-control" id="username" name="un" value="<?php $htmlOut($data['userName']); ?>"/>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control" id="password" name="password" />
        </div>
        <button class="btn btn-primary">Login</button>
    <?php $endForm(); ?>


<?php $render('partial/footer', $data); ?>
