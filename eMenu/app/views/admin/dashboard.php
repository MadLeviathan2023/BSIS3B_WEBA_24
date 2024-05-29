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
        $link->addStyle('admin-dashboard');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new AdminSideBar();
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Dashboard</h1>
        </section>
        <section>
            <div class="container">
                <div class="count-cards-container">
                    <div class="count-card">
                        <h3>Accounts</h3>
                        <h2><?= is_array($accounts) ? decimalFormat(count($accounts)) : 0 ?></h2>
                    </div>
                    <div class="count-card">
                        <h3>Products</h3>
                        <h2><?= is_array($products) ? decimalFormat(count($products)) : 0 ?></h2>
                    </div>
                    <div class="count-card">
                        <h3>Tables</h3>
                        <h2><?= is_array($tables) ? decimalFormat(count($tables)) : 0 ?></h2>
                    </div>
                </div>
                <h3>Charts</h3>
                <div class="charts-container">
                    <div id="monthly-order-count" class="chart"></div>
                    <div id="monthly-sales" class="chart"></div>
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
    <script type="module" src="<?= ROOT ?>/js/admin-dashboard.js"></script>
</body>
</html>