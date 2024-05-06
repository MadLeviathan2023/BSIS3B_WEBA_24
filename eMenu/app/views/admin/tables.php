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
        $link->addStyle('modal');
        $link->addStyle('admin-sidebar');
        $link->addStyle('admin');
        $link->addStyle('admin-tbl');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new AdminSideBar();
        $sidebar->setActive('tables');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Tables</h1>
        </section>
        <section>
            <div class="container">
            <h3>Manage Tables</h3>
                <div class="header-container">
                    <form action="<?= ROOT ?>/admin/categories">
                        <input type="text" placeholder="Search..." id="txtSearch" name="search" value="">
                        <button type="submit" id="search-icon" class="material-symbols-outlined">search</button>
                    </form>
                    <a href="<?= ROOT ?>/admin/add_tbl">
                        <span class="material-symbols-outlined">add</span>&nbsp;Add Table
                    </a>
                </div>
                <div class="table-container">
                    <table>
                        <tr>
                            <th>Table Name</th>
                            <th>Table Status</th>
                            <th>Actions</th>
                        </tr>
                        <?php if (is_array($tables) && count($tables) > 0): ?>
                            <?php foreach($tables as $table): ?>
                                <tr>
                                    <td><?= $table->table_name ?></td>
                                    <td><?= $table->table_status ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?= ROOT ?>/admin/download_tbl_qr/<?= $table->table_id ?>"><span class="material-symbols-outlined">download</span>&nbsp;Download QR</a>
                                            <a href="<?= ROOT ?>/admin/edit_tbl/<?= $table->table_id ?>"><span class="material-symbols-outlined">edit</span>&nbsp;Edit</a>
                                            <button type="button" class="delete-btn" tbl_id="<?= $table->table_id ?>"><span class="material-symbols-outlined">delete</span>&nbsp;Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No Result</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <?php
        $modal = new Modal();
        $modal->load();
    ?>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
    <script type="module" src="<?= ROOT ?>/js/admin-tbl.js"></script>
</body>
</html>