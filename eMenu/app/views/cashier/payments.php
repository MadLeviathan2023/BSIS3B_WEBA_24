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
        $link->addStyle('cashier-payments');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new CashierSideBar();
        $sidebar->setActive('payments');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Payments</h1>
        </section>
        <section>
            <div class="container">
                <h3>Manage Payments</h3>
                <div class="table-container">
                    <table>
                        <tr>
                            <th>Table</th>
                            <th>Time Started</th>
                            <th>Session Status</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <td>Table One</td>
                            <td>12:00 PM</td>
                            <td>ongoing</td>
                            <td>
                                <button type="button" class="payment-btn">Payment</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <dialog id="payment-dialog">
        <h3>Receipt</h3>
        <button class="close-btn">
            <span class="material-symbols-outlined">close</span>
        </button>
        <hr>
        <h4>Table One</h4>
        <div class="receipt-container">
            <table>
                <tr>
                    <th>Product</th>
                    <th>QTY</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>Adobo</td>
                    <th>2</th>
                    <td>₱100.00</td>
                </tr>
                <tr>
                    <td>Rice</td>
                    <th>3</th>
                    <td>₱45.00</td>
                </tr>
            </table>
            <hr>
            <div class="total-container">
                Total: ₱145.00
            </div>
            <div class="payment">
                <label for="payment-method">
                    Payment Method:*
                    <select name="" id="payment-method">
                        <option value=""></option>
                        <option value="gcash">GCash</option>
                        <option value="paypal">PayPal</option>
                        <option value="traditional">Traditional</option>
                    </select>
                </label>
                <!-- <label for="ref-no">
                    Ref-No.:*
                    <input type="number" id="ref-no">
                </label> -->
                <div class="set-paid-btn-container">
                    <button id="set-paid-btn">Submit</button>
                </div>
            </div>
        </div>
    </dialog>
    <script type="text/javascript" src="<?= ROOT ?>/js/cashier-sidebar.js"></script>
    <script type="text/javascript" src="<?= ROOT ?>/js/cashier-payments.js"></script>
</body>
</html>