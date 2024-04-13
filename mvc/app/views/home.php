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
        $link->addStyle('modal');
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
    <div class="intruction-container">
        <div class="instruction-content">
            <h2>How to order?</h2>
            <ol>
                <li>Pick a free table and scan the QR Code on it. (You can use the QR Scanner below or your own Scanner App)</li>    
                <li>Follow the scanned link to get in the Menu list where you can also place your order.</li>
                <li>Simply choose your orders and add it to your cart.</li>
                <li>Proceed to checkout in order to confirm or modify your order.</li>
                <li>Done! You've successfully ordered! Just wait 'til your order arrives.</li>
                <li>Payment can be done in traditional way or via Gcash or PayPal.</li>
            </ol>
        </div>
    </div>
    <div class="open-qr">
        <button id="btn1">Button 1</button>
    </div>
    <script type="module" src="js/home.js"></script>
    <?php
        $modal = new Modal();
        $modal->load();
    ?>
</body>
</html>