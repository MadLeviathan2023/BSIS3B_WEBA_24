<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $link = new Link();
        $link->fontAwesome();
        $link->logo();
        $link->addStyle('root');
        $link->addStyle('menu-nav');
        $link->addStyle('cart');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $nav = new MenuNav();
        $nav->setActive('cart');
        $nav->load();
    ?>
</body>
</html>