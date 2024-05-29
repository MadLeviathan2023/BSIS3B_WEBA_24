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
            <div class="card-input">
                <div class="card-qty">
                    <button class="btn-subtract-one">-</button>
                    <input type="number" value="0" class="txt-qty">
                    <button class="btn-add-one">+</button>
                </div>
                <div class="card-button">
                    <button class="btn-add-to-cart">Add to cart</button>
                </div>
            </div>
        </div>
    </div>
    <div class="out-of-stack <?= $this->card_status != 'available' ? 'visible' : '' ?>">
        <div>Out of Stack</div>
    </div>
</div>