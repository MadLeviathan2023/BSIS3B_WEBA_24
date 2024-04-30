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
        $link->addStyle('menu-header');
        $link->addStyle('menu-card');
        $link->addStyle('menu');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $nav = new MenuNav();
        $nav->load();
        $header = new MenuHeader();
        if (isset($_GET['category'])){
            $header->setCategory($_GET['category']);
        }
        if (isset($_GET['search'])){
            $header->setSearchVal($_GET['search']);
        }
        $header->load();
    ?>
    <main>
        <section>
            <h4 class="right-arrow"><?= $table->table_name ?></h4>
            <h4 class="right-chevron">Menu</h4>
        </section>
        <section class="card-section">
            <?php 
                if (is_array($product) && count($product) > 0){
                    $flexgrow = count($product) > 3 ? true : false;
                    foreach ($product as $item) {
                        $card = new MenuCard();
                        $card->setInfo($item->product_id, $item->product_name, $item->product_price, $item->product_category, $item->product_img, $item->product_status, $flexgrow);
                        $card->load();
                    }
                }
                else{
                    echo 'No Result';
                }
            ?>
        </section>
        <script type="text/javascript" src="<?= ROOT ?>/js/menu-card.js"></script>
    </main>
</body>
</html>