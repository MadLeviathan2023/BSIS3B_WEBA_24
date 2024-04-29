<?php
    class MenuNav extends Component{
        protected $name = 'menu-nav';
        protected $active = 'menu';
        protected $table_name = '';

        public function setActive($newActive){
            $this->active = $newActive;
        }
    }