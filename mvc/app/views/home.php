<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $link = new CSSLink();
        $link->cdnjs();
        $link->add('root');
        $link->add('nav');
        $link->add('home');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $nav = new Nav();
        $nav->load();
    ?>
</body>
</html>