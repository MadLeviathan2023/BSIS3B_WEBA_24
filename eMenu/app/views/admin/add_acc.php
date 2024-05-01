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
        $link->addStyle('admin-accounts');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new AdminSideBar();
        $sidebar->setActive('accounts');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Accounts</h1>
        </section>
        <section>
            <div class="container">
                <div class="header-container flex">
                    <h3>Add Account</h3>
                    <a href="<?= ROOT ?>/admin/accounts" class="anchor-btn"><span class="material-symbols-outlined">arrow_back</span>&nbsp;Go Back</a>
                </div>
                <form action="<?= ROOT ?>/admin/insert_acc" method="POST" class="post-form">
                    <label for="first_name">
                        First Name* : <input type="text" name="first_name" placeholder="e.g. John" maxlength="20" autocomplete="off" required>
                    </label>
                    <label for="middle_name">
                        Middle Name : <input type="text" name="middle_name" placeholder="e.g. Dwayne" maxlength="20" autocomplete="off">
                    </label>
                    <label for="last_name">
                        Last Name* : <input type="text" name="last_name" placeholder="e.g. Smith" maxlength="20" autocomplete="off" required>
                    </label>
                    <label for="username">
                        Username* : <input type="text" name="username" placeholder="e.g. JohnSmith24" maxlength="20" autocomplete="off" required>
                    </label>
                    <label for="email">
                        Email* : <input type="email" name="email" placeholder="e.g. johnsmith@yahoo.com" maxlength="75" autocomplete="off" required>
                    </label>
                    <label for="">
                        Usertype* : 
                        <select name="usertype" required>
                            <option value=""></option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </label>
                    <input type="hidden" name="password">
                    <input type="hidden" name="user_qr">
                    <button type="submit" class="form-btn"><span class="material-symbols-outlined">person_add</span>&nbsp;Add</button>
                </form>
            </div>            
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
</body>
</html>