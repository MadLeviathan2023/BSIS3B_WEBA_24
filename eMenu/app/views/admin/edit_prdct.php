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
            <h1><?= $sidebar->loadButton() ?>Categories</h1>
        </section>
        <section>
            <div class="container">
                <div class="header-container flex">
                    <h3>Edit Product</h3>
                    <a href="<?= ROOT ?>/admin/products" class="anchor-btn"><span class="material-symbols-outlined">arrow_back</span>&nbsp;Go Back</a>
                </div>
                <form action="<?= ROOT ?>/admin/update_prdct" method="POST" class="post-form" enctype="multipart/form-data">
                    <?= showError($err) ?>
                    <label for="product_img">
                        Product Image : 
                        <button type="button" class="form-btn upload-btn" id="upload-btn"><span class="material-symbols-outlined">upload</span>Change Image</button>
                        <input type="file" name="product_img" id="product_img">
                    </label>
                    <div class="img-container">
                        <img src="<?= $this->displayProductImg($product->product_id . '/' . $product->product_img); ?>" alt="image" id="img_display" default="<?= $this->displayProductImg($product->product_id . '/' . $product->product_img); ?>">
                    </div>
                    <label for="product_name">
                        Product Name* : <input type="text" name="product_name" value="<?= $product->product_name ?>" placeholder="e.g. Adobo, Sinigang, and Mechado" maxlength="30" autocomplete="off" required>
                    </label>
                    <label for="product_price">
                        Product Price* : <input type="number" name="product_price" value="<?= $product->product_price ?>" placeholder="e.g. Adobo, Sinigang, and Mechado" autocomplete="off" required>
                    </label>
                    <label for="">
                        Product Category* : 
                        <select name="category_id" required>
                            <option value=""></option>
                            <?php foreach($categories as $category): ?>
                                <option value="<?= $category->category_id ?>" <?= $category->category_id == $product->category_id ? 'selected' : '' ?>><?= $category->category_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label for="product_status">
                        Product Status* : 
                        <select name="product_status" required>
                            <option value=""></option>
                            <?php 
                                $options = ['available', 'out of stock'];
                                for($i = 0; $i < count($options); $i++){
                                    ?> <option value="<?= $options[$i] ?>" <?= $options[$i] == $product->product_status ? 'selected' : '' ?>><?= ucfirst($options[$i]) ?></option> <?php
                                }
                            ?>
                        </select>
                    </label>
                    <input type="hidden" name="product_id" value="<?= $product->product_id ?>">
                    <button type="submit" class="form-btn"><span class="material-symbols-outlined">update</span>&nbsp;Update</button>
                </form>
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