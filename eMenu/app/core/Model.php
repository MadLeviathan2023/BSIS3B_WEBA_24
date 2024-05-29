<?php
    class Model extends Database{
        public $errors = [];

        public function __construct(){
            if (!property_exists($this, 'table')){
                $this->table = strtolower($this::class) . 's';
            }
        }

        public function findAll(){
            $query = "SELECT * FROM $this->table";
            $result = $this->query($query);
            if ($result){
                return $result;
            }
            return false;
        }

        public function where($data, $data_not = []){
            $keys = array_keys($data);
            $keys_not = array_keys($data_not);
            $query = "SELECT * FROM $this->table WHERE ";

            foreach($keys as $key){
                $query .= $key . " = :" . $key . " && ";
            }
            foreach($keys_not as $key){
                $query .= $key . " != :" . $key . " && ";
            }      

            $query = trim($query, " && ");      
            $data = array_merge($data, $data_not);
            $result = $this->query($query, $data);
            
            if ($result){
                return $result;
            }
            return false;
        }

        public function like($data, $string){
            $columns = $data;
            $query = "SELECT * FROM $this->table WHERE CONCAT(";

            foreach ($columns as $column){
                $query .= $column . ", ";
            }

            $query = trim($query, ", ");
            $query .= ") LIKE '%" . $string . "%'";
            $result = $this->query($query);

            if ($result){
                return $result;
            }
            return false;
        }

        public function insert($data){
            $columns = implode(', ', array_keys($data));
            $values = implode(', :', array_keys($data));
            $query = "INSERT INTO $this->table ($columns) VALUES (:$values)";
            $this->query($query, $data);

            return false;
        }

        public function update($id, $data, $column = 'id'){
            $keys = array_keys($data);
            $query = "UPDATE $this->table SET ";

            foreach($keys as $key){
                $query .= $key . " = :" . $key . ", ";
            }

            $query = trim($query, ", ");
            $query .= " WHERE $column = :$column";
            $data[$column] = $id;
            $this->query($query, $data);
            
            return false;
        }

        public function delete($id, $column = 'id'){
            $data[$column] = $id;
            $query = "DELETE FROM $this->table WHERE $column = :$column";
            $this->query($query, $data);

            return false;
        }

        public function isExists($data, $column){
            if (isset($data[$column])){
                $acc[$column] = $data[$column];
                $result = $this->where($acc);
                if (is_array($result) && count($result) > 0){
                    return true;
                }
            }
            return false;
        }
    }