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
        $link->addStyle('admin-ctgry');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new AdminSideBar();
        $sidebar->setActive('categories');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Categories</h1>
        </section>
        <section>
            <div class="container">
                <div class="header-container flex">
                    <h3>Add Category</h3>
                    <a href="<?= ROOT ?>/admin/categories" class="anchor-btn"><span class="material-symbols-outlined">arrow_back</span>&nbsp;Go Back</a>
                </div>
                <form action="<?= ROOT ?>/admin/insert_ctgry" method="POST" class="post-form">
                    <?= showError($err) ?>
                    <label for="category_name">
                        Category Name* : <input type="text" name="category_name" value="<?= get_post('category_name') ?>" placeholder="e.g. Drinks, Soups and Dishes" maxlength="20" autocomplete="off" required>
                    </label>
                    <button type="submit" class="form-btn"><span class="material-symbols-outlined">add</span>&nbsp;Add</button>
                </form>
            </div>            
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
</body>
</html>