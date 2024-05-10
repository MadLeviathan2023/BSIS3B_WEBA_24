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
        $link->addStyle('admin-reports');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new AdminSideBar();
        $sidebar->setActive('reports');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Reports</h1>
        </section>
        <section>
            <div class="container">
                <h3>Manage Reports</h3>
                <h4>Order History</h4>
                <div class="table-container">
                    <table>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Table Name</th>
                            <th>Order Date</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Adobo</td>
                            <td>Table One</td>
                            <td>May 12, 2024</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Rice</td>
                            <td>Table One</td>
                            <td>May 12, 2024</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
</body>
</html>