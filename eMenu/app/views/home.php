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
        $link->addStyle('home');
        $link->addStyle('modal');
        $link->addStyle('web-scanner');
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
                <h1>Welcome!</h1>&nbsp;
                <p class="welcome-msg"></p><p>|</p>
            </div>
        </div>
        <div class="app-logo">
            <img src="images/<?= APP_LOGO ?>" alt="Logo">
        </div>
    </div>
    <div class="instruction-container">
        <div class="instruction-content">
            <h2>How to order?</h2>
            <ol>
                <li>
                    Scan the QR Code:
                    <ul>
                        <li>Locate a free table with a QR code displayed.</li>
                        <li>Use the QR scanner provided below or your preferred scanner app to scan the code.</li>
                    </ul>
                </li>
                <li>
                    Access the Menu and Place Your Order:
                    <ul>
                        <li>After scanning, you will be directed to a link containing our menu.</li>
                        <li>Browse through the menu and select your desired items, adding them to your cart.</li>
                    </ul>
                </li>
                <li>
                    Review and Confirm Your Order:
                    <ul>
                        <li>Once you have added all your items, proceed to the checkout page.</li>
                        <li>Review your order and make any necessary modifications.</li>
                    </ul>
                </li>
                <li>
                    Complete Your Order:
                    <ul>
                        <li>After confirming your order, simply wait for it to arrive at your table.</li>
                    </ul>
                </li>
                <li>
                    Payment Options:
                    <ul>
                        <li>You can choose to pay in the traditional way or via digital wallets like Gcash or PayPal.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
    <div class="open-qr-scanner-container">
        <button id="btnOpenQR" title="Don't have a QR Scanner App? No Problem! Just click here.">
            <i class="fa-solid fa-qrcode"></i>
            QR Scanner
        </button>
    </div>
    <?php
        $modal = new Modal();
        $modal->load();
        $webScanner = new WebScanner();
        $webScanner->load();
    ?>
    <script type="module" src="<?= ROOT ?>/js/WebScanner.js"></script>
    <script type="module" src="<?= ROOT ?>/js/home.js"></script>
</body>
</html>