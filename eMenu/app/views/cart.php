<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $link = new Link();
        $link->fontAwesome();
        $link->logo();
        $link->addStyle('root');
        $link->addStyle('menu-nav');
        $link->addStyle('cart');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $nav = new MenuNav();
        $nav->setVisible('menu');
        $nav->load();
    ?>
    <main>
        <section>
            <h4 class="right-arrow">Your Cart</h4>
        </section>
        <section class="cart-items-container">
            <table>
                <colgroup>
                    <col span="1" style="width: 40%">
                    <col span="1" style="width: 30%">
                    <col span="1" style="width: 15%">
                    <col span="1" style="width: 15%">
                </colgroup>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>Adobo</td>
                    <td><span>₱</span>50</td>
                    <td>
                        <label class="qty-input">
                            <button type="button" class="decrement-btn">-</button>
                            <input type="number" class="txt-qty" min="0" max="9" value="1">
                            <button type="button" class="increment-btn">+</button>
                        </label>
                    </td>
                    <td>
                        <button type="button" class="btn-remove-item"><i class="fa-solid fa-trash"></i> Remove</button>
                    </td>
                </tr>
            </table>
        </section>
        <form action="">
            <section class="checkout-container">
                <hr>
                <div class="total-container"><span>Total: ₱</span>50</div>
                <a href="">Checkout</a>
            </section>
        </form>
    </main>
</body>
</html>