<?php
    class Product extends Model{
        public function search($category = '', $string = ''){
            $hasCategory = !empty($category) ? 'category_id = ' . $category . " AND " : '';
            $query = "SELECT * FROM $this->table WHERE $hasCategory CONCAT(product_name) LIKE '%" . $string . "%'";
            $result = $this->query($query);

            if ($result){
                return $result;
            }
            return false;
        }
    }