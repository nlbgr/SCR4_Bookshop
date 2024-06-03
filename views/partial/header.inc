<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>SCR4 Book Shop</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
        <div class="container">
            <?php $link('SCR4 Book Shop', 'Home', 'Index', cssClass: 'navbar-brand'); ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <nav class="navbar-nav me-auto">
                    <?php $link('Home', 'Home', 'Index', cssClass: 'nav-link'); ?>
                    <?php $link('Books', 'Books', 'Index', cssClass: 'nav-link'); ?>
                    <?php $link('Search', 'Books', 'Search', cssClass: 'nav-link'); ?>
                    <?php $link('Checkout', 'Order', 'Create', cssClass: 'nav-link'); ?>
                </nav>
                <?php $render('partial/user', $data['user']); // TODO ?>
                <!-- TODO: navigation user -->
            </div>
        </div>
    </nav>
    <div class="container mb-3">

        <?php
            if(isset($data['errors'])) {
                $render('partial/errors', $data['errors']);
            }
        ?>
