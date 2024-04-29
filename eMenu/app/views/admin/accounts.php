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
                <h3>Manage Accounts</h3>
                <div class="header-container">
                    <form action="<?= ROOT ?>/admin/accounts">
                        <input type="text" placeholder="Search..." id="txtSearch" name="search" value="<?= $search ?>">
                        <button type="submit" id="search-icon" class="material-symbols-outlined">search</button>
                    </form>
                    <a href="<?= ROOT ?>/admin/add_account">
                        <span class="material-symbols-outlined">person_add</span>&nbsp;Add Account
                    </a>
                </div>
                <div class="table-container">
                    <table>
                        <tr>
                            <th>Fist Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Usertype</th>
                            <th>Actions</th>
                        </tr>
                        <?php if (is_array($users) && count($users) > 0) { ?>
                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td><?= $user->first_name ?></td>
                                    <td><?= $user->middle_name ?></td>
                                    <td><?= $user->last_name ?></td>
                                    <td><?= $user->username ?></td>
                                    <td><?= $user->usertype ?></td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6">No Result</td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>            
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
</body>
</html>