<?php
    class AdminSideBar extends Component{
        protected $name = 'admin-sidebar';
        protected $active = 'dashboard';

        public function setActive($option){
            $this->active = $option;
        }

        public function loadButton(){
            echo '<button id="sidebar-btn" class="material-symbols-outlined">menu</button>';
        }
    }