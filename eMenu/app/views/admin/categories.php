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
        $sidebar->setActive('categories');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Categories</h1>
        </section>
        <section>
            <div class="container">
            <h3>Manage Categories</h3>
                <div class="header-container">
                    <form action="<?= ROOT ?>/admin/categories">
                        <input type="text" placeholder="Search..." id="txtSearch" name="search" value="">
                        <button type="submit" id="search-icon" class="material-symbols-outlined">search</button>
                    </form>
                    <a href="<?= ROOT ?>/admin/add_ctgry">
                        <span class="material-symbols-outlined">add</span>&nbsp;Add Category
                    </a>
                </div>
                <div class="table-container">
                    <table>
                        <tr>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                        <?php if (is_array($categories) && count($categories) > 0): ?>
                            <?php foreach($categories as $category): ?>
                                <tr>
                                    <td><?= $category->category_name ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?= ROOT ?>/admin/edit_ctgry/<?= $category->category_id ?>"><span class="material-symbols-outlined">edit</span>&nbsp;Edit</a>
                                            <button type="button" class="delete-btn" ctgry_id="<?= $category->category_id ?>"><span class="material-symbols-outlined">delete</span>&nbsp;Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="2">No Result</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
</body>
</html>