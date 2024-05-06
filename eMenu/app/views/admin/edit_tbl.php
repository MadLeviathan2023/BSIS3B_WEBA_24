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
                    <h3>Edit Table</h3>
                    <a href="<?= ROOT ?>/admin/tables" class="anchor-btn"><span class="material-symbols-outlined">arrow_back</span>&nbsp;Go Back</a>
                </div>
                <form action="<?= ROOT ?>/admin/update_tbl" method="POST" class="post-form">
                    <?= showError($err) ?>  
                    <label for="table_name">
                        Table Name* : <input type="text" name="table_name" value="<?= $table->table_name ?>" placeholder="e.g. Table 01, Table 02, etc." maxlength="20" autocomplete="off" required>
                    </label>
                    <label for="table_status" required>
                        Table Status* : 
                        <select name="table_status">
                            <option value=""></option>
                            <?php
                                $options = ['available', 'maintenance'];
                                foreach ($options as $option){
                                    ?> <option value="<?= $option ?>" <?= $table->table_status == $option ? 'selected' : '' ?>><?= ucfirst($option) ?></option> <?php
                                }
                            ?>
                        </select>
                    </label>
                    <input type="hidden" name="table_id" value="<?= $table->table_id ?>">
                    <button type="submit" class="form-btn"><span class="material-symbols-outlined">update</span>&nbsp;Update</button>
                </form>
            </div>            
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
</body>
</html>