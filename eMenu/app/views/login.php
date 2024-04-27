<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $link = new Link();
        $link->logo();
        $link->fontAwesome();
        $link->addStyle('root');
        $link->addStyle('nav');
        $link->addStyle('login');
        $link->addStyle('modal');
        $link->addStyle('web-scanner');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $nav = new Nav();
        $nav->setActive('log in');
        $nav->load();
    ?>
    <div class="login-container">
        <div class="login-form">
            <form action="<?= ROOT ?>/login/auth" method="POST">
                <h2>Welcome!</h2>
                <label id="lblUsername" for="txtUsername">
                    <input type="text" class="textbox" name="txtUsername" id="txtUsername" autocomplete="username" required>
                </label>
                <label id="lblPassword" for="txtPassword">
                    <input type="password" class="textbox" name="txtPassword" id="txtPassword" autocomplete="current-password" required>
                    <button type="button" id="btnShowHidePass" title="Show Password"><i class="fa-solid fa-eye" id="btnShowHidePass-Icon"></i></button>
                </label>
                <input type="submit" value="Log In" name="btnLogIn" id="btnLogIn">
                <input type="button" value="Log In with QR Code" id="btnOpenScanner">
            </form>
        </div>
    </div>
    <?php
        $modal = new Modal();
        $modal->load();
        $scanner = new WebScanner();
        $scanner->load();
    ?>
    <script type="module" src="<?= ROOT ?>/js/login.js"></script>
</body>
</html>