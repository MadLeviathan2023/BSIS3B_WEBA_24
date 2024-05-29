<?php
    class CashierSideBar extends Component{
        protected $name = 'cashier-sidebar';
        protected $active = 'orders';

        public function setActive($option){
            $this->active = $option;
        }

        public function loadButton(){
            echo '<button id="sidebar-btn" class="material-symbols-outlined">menu</button>';
        }
    }