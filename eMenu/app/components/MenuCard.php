<?php
    class MenuCard extends Component{
        protected $name = 'menu-card';
        protected $card_id = '';
        protected $card_name = 'Card Name';
        protected $price = 0.00;
        protected $card_ctgry = 'Category';
        protected $card_img = 'no-image.png';
        protected $card_status = 'available';
        protected $isFlexGrow = false;
        protected $img_src = ROOT . '/images/no-image.png';

        public function setInfo($id, $name, $price, $ctgry, $img = '', $status, $fg = false){
            $this->card_id = $id;
            $this->card_name = $name;
            $this->price = $price;
            $this->card_ctgry = $ctgry;
            $this->isFlexGrow = $fg;
            $this->card_status = $status;
            if (!empty($img)){
                $this->card_img = $img;
                $this->img_src = ROOT . '/uploads/product_img/' . $this->card_id . '/' . $this->card_img;
            }
        }
    }