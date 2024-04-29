<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $link = new Link();
        $link->logo();
        $link->googleFonts();
        $link->addStyle('root');
        $link->addStyle('admin-sidebar');
        $link->addStyle('admin');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new AdminSideBar();
        $sidebar->setActive('products');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Products</h1>
        </section>
    </main>
</body>
</html>