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
        $sidebar->setActive('tables');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Categories</h1>
        </section>
        <section>
            <div class="container">
                <div class="header-container flex">
                    <h3>Add Table</h3>
                    <a href="<?= ROOT ?>/admin/tables" class="anchor-btn"><span class="material-symbols-outlined">arrow_back</span>&nbsp;Go Back</a>
                </div>
                <form action="<?= ROOT ?>/admin/insert_tbl" method="POST" class="post-form">
                    <?= showError($err) ?>  
                    <label for="table_name">
                        Table Name* : <input type="text" name="table_name" value="" placeholder="e.g. Table 01, Table 02, etc." maxlength="20" autocomplete="off" required>
                    </label>
                    <label for="table_status" required>
                        Table Status* : 
                        <select name="table_status">
                            <option value=""></option>
                            <?php
                                $options = ['available', 'maintenance'];
                                foreach ($options as $option){
                                    ?> <option value="<?= $option ?>"><?= ucfirst($option) ?></option> <?php
                                }
                            ?>
                        </select>
                    </label>
                    <button type="submit" class="form-btn"><span class="material-symbols-outlined">add</span>&nbsp;Add</button>
                </form>
            </div>            
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
    <script type="module" src="<?= ROOT ?>/js/admin-tbl.js"></script>
</body>
</html>