<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $link = new Link();
        $link->logo();
        $link->cdnjs();
        $link->addStyle('root');
        $link->addStyle('nav');
        $link->addStyle('home');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $nav = new Nav();
        $nav->load();
    ?>
    <div class="welcome-container">
        <div class="welcome-text">
            <div class="text-container">
                <h1>Welcome!</h1>
                <p>
                    &nbsp;to where exceptional flavors and warm hospitality await you.
                </p>
            </div>
        </div>
        <div class="app-logo">
            <img src="images/<?= APP_LOGO ?>" alt="Logo">
        </div>
    </div>
</body>
</html>