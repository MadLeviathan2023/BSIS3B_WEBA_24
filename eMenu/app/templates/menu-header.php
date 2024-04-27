<header>
    <form action="<?= ROOT ?>/menu/search" method="POST" id="frmSearch">
        <div class="category-container">
            <label for="selCategory" id="lblCategory">Category :&nbsp;</label>
            <select name="selCategory" id="selCategory" title="Category">
                <option value="">All</option>
                <?php
                    $category = new Category();
                    $result = $category->findAll();
                    foreach ($result as $row){ ?>
                        <option value="<?= $row->category_id ?>"><?= $row->category_name ?></option>
                    <?php }
                ?>
            </select>
        </div>
        <div class="search-div">
            <input type="text" placeholder="Search..." id="txtSearch">
            <button type="submit" id="btnSubmit" title="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>
</header>
<script type="text/javascript" src="<?= ROOT ?>/js/menu-header.js"></script>