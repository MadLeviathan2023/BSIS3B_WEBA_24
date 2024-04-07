<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/root.css"/>
    <link rel="stylesheet" href="css/nav.css"/>
    <link rel="stylesheet" href="css/home.css"/>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $nav = new Nav();
        $nav->load();
    ?>
</body>
</html>