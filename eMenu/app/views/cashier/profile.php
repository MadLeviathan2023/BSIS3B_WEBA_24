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
        $link->addStyle('cashier');
        $link->addStyle('cashier-sidebar');
        $link->addStyle('profile');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new CashierSideBar();
        $sidebar->setActive('profile');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Profile</h1>
        </section>
        <section>
            <div class="container">
                <h3>Your Profile</h3>
                <form action="" method="POST">
                    <div class="profile-container">
                        <label for="">First Name:*</label><input type="text" value="<?= $user->first_name ?>">
                        <label for="">Middle Name:</label><input type="text" value="<?= $user->middle_name ?>">
                        <label for="">Last Name:*</label><input type="text" value="<?= $user->last_name ?>">
                        <label for="">Username:*</label><input type="text" value="<?= $user->username ?>">
                        <label for="">Email:*</label><input type="email" value="<?= $user->email ?>">
                        <button type="submit" class="submit-btn">Update Profile</button>
                    </div>
                </form>
                <h3>Change Password</h3>
                <form action="" method="POST">
                    <div class="profile-container">
                        <label for="">Current Password:*</label><input type="password">
                        <label for="">New Password:*</label><input type="password">
                        <label for="">Confirm Password:*</label><input type="password">                        
                    </div>
                    <button type="submit" class="submit-btn">Update Password</button>
                </form>
            </div>
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/cashier-sidebar.js"></script>
</body>
</html>