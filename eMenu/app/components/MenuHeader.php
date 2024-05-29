<?php
    class MenuHeader extends Component{
        protected $name = 'menu-header';
        protected $category = '';
        protected $searchval = '';

        public function setCategory($ctgry){
            $this->category = $ctgry;
        }

        public function setSearchVal($string){
            $this->searchval = $string;
        }
    }