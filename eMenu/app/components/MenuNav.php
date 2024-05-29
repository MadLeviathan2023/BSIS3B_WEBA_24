<?php
    class MenuNav extends Component{
        protected $name = 'menu-nav';
        protected $visible = 'cart';
        protected $table_name = '';

        public function setVisible($elem){
            $this->visible = $elem;
        }
    }