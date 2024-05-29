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
    <button type="button" id="open-chat-btn">
        <i class="fa-solid fa-comment"></i>
    </button>
    <div class="chats-container">
        <div class="chat-container-header">
            <h3>Chatbot</h3>
            <button type="button" id="close-chat-btn"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="chat-contents">
            <ul class="chats-ul">
                <li class="outgoing"><p>Hello!</p></li>
                <li class="incoming"><p>Hi! I'm your Virual Assistance Chatbot</p></li>
                <li class="outgoing"><p>Please recommend me a dish.</p></li>
                <li class="incoming"><p>I recommend Adobo from our menu... it has x and y value... </p></li>
            </ul>
        </div>
        <hr>
        <div class="chat-input-container">
            <input type="text" id="chat-input" placeholder="Enter your messages here...">
            <button type="button" id="send-chat-btn">Send <i class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>
    <script type="text/javascript" src="<?= ROOT ?>/js/menu.js"></script>
</body>
</html>