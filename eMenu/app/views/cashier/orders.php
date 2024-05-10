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
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new CashierSideBar();
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Orders</h1>
        </section>
        <section>
            <div class="container">
                <h3>Manage Orders</h3>
                <div class="header-container">
                    <label for="">
                        Status: 
                        <select name="orders-filter">
                            <option value="new">New</option>
                            <option value="in progress">In Progress</option>
                            <option value="ready for pickup">Ready for Pickup</option>
                            <option value="delivered">Delivered</option>
                        </select>
                    </label>
                </div>
                <div class="table-container">
                    <table>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Table</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <td>Adobo</td>
                            <td>2</td>
                            <td>Table One</td>
                            <td>New</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="form-btn">Mark as In Progress</button>
                                    <button class="form-btn">Cancel Order</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/cashier-sidebar.js"></script>
</body>
</html>