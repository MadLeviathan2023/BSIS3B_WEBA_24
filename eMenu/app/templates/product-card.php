<div class="card-container <?= $this->isFlexGrow == true ? 'flex-grow' : '' ?>">
    <div class="card-contents">        
        <div class="card-image">
            <img src="<?= $this->img_src ?>" alt="<?= $this->card_img ?>">
        </div>
        <span class="card-category">
            <?= $this->card_ctgry ?>
        </span>
        <div class="card-details">
            <div class="card-info">
                <h3><?= $this->card_name ?></h3>
                <b>Price: </b><i>&#8369;<?= $this->price ?></i>
            </div>
            <div class="card-action-buttons">
                <a href="<?= ROOT ?>/admin/edit_prdct/<?= $this->card_id ?>" class="btn"><span class="material-symbols-outlined">edit</span>Edit</a>
                <button class="btn" prdct_id="<?= $this->card_id  ?>"><span class="material-symbols-outlined">delete</span>Delete</button>
            </div>
        </div>
    </div>
</div>