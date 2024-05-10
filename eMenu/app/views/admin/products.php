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
        $link->addStyle('product-card');
        $link->addStyle('admin-sidebar');
        $link->addStyle('admin');
        $link->addStyle('modal');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new AdminSideBar();
        $sidebar->setActive('products');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Products</h1>
        </section>
        <section>
            <div class="container">
                <h3>Manage Products</h3>
                <div class="header-container">
                    <form action="<?= ROOT ?>/admin/products">
                        <input type="text" placeholder="Search..." id="txtSearch" name="search" value="<?= $search ?>">
                        <button type="submit" id="search-icon" class="material-symbols-outlined">search</button>
                    </form>
                    <a href="<?= ROOT ?>/admin/add_prdct">
                        <span class="material-symbols-outlined">add</span>&nbsp;Add Product
                    </a>
                </div>
                <div>
                    <div class="card-section">
                        <?php if (is_array($products) && count($products) > 0): ?>
                            <?php 
                                $isFlexGrow = count($products) > 3 ? true : false;
                                foreach($products as $product):
                                    $card = new ProductCard();
                                    $card->setInfo($product->product_id, $product->product_name, $product->product_price, $product->product_category, $product->product_img, $product->product_status, $isFlexGrow);
                                    $card->load();
                                endforeach;
                            ?>
                        <?php else: ?>
                            <?= 'No Result' ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
        $modal = new Modal();
        $modal->load();
    ?>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
    <script type="module" src="<?= ROOT ?>/js/admin-prdct.js"></script>
</body>
</html>