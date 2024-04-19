<?php
    class Nav extends Component{
        protected $active = 'home';
        
        public function setActive($option){
            if (!empty($option)){
                $this->active = $option;
            }
        }
    }