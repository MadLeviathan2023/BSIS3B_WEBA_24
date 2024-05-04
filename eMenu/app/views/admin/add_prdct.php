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
        $link->addStyle('admin-prdct');
    ?>
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php
        $sidebar = new AdminSideBar();
        $sidebar->setActive('categories');
        $sidebar->load();
    ?>
    <main>
        <section>
            <h1><?= $sidebar->loadButton() ?>Categories</h1>
        </section>
        <section>
            <div class="container">
                <div class="header-container flex">
                    <h3>Add Product</h3>
                    <a href="<?= ROOT ?>/admin/products" class="anchor-btn"><span class="material-symbols-outlined">arrow_back</span>&nbsp;Go Back</a>
                </div>
                <form action="<?= ROOT ?>/admin/insert_prdct" method="POST" class="post-form" enctype="multipart/form-data">
                    <?= showError($err) ?>
                    <label for="product_img">
                        Product Image : 
                        <button type="button" class="form-btn upload-btn" id="upload-btn"><span class="material-symbols-outlined">upload</span>Upload Image</button>
                        <input type="file" name="product_img" id="product_img">
                    </label>
                    <div class="img-container">
                        <img src="<?= ROOT ?>/images/no-image.png" alt="image" id="img_display">
                    </div>
                    <label for="product_name">
                        Product Name* : <input type="text" name="product_name" value="<?= get_post('product_name') ?>" placeholder="e.g. Adobo, Sinigang, and Mechado" maxlength="30" autocomplete="off" required>
                    </label>
                    <label for="product_price">
                        Product Price* : <input type="number" name="product_price" value="<?= get_post('product_price') ?>" placeholder="e.g. Adobo, Sinigang, and Mechado" autocomplete="off" required>
                    </label>
                    <label for="">
                        Product Category* : 
                        <select name="category_id">
                            <option value=""></option>
                            <?php foreach($categories as $category): ?>
                                <option value="<?= $category->category_id ?>"><?= $category->category_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <button type="submit" class="form-btn"><span class="material-symbols-outlined">add</span>&nbsp;Add</button>
                </form>
            </div>            
        </section>
    </main>
    <script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>
    <script type="module" src="<?= ROOT ?>/js/admin-prdct.js"></script>
</body>
</html>