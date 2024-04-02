<?php
    class Model extends Database{
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
            $keys = array_key($data);
            $keys_not = array_keys($data_not);
            $query = "SELECT * FROM $this->table WHERE ";
            foreach($keys as $key){
                $query .= $key . "=:" . $key . "&&";
            }
            $data = array_merge($data, $data_not);
            $result = $this->query($query, $data);

            if ($result){
                return $result;
            }
            return false;
        }

        public function insert($data){
            $columns = implode(',', array_keys($data));
            $values = implode(',:', array_keys($data));
            $query = "INSERT INTO $this->table ($columns) VALUES (:$values)";
            show($query);
            $this->query($query, $data);

            return false;
        }

        public function update($id, $data, $column = 'id'){
            $key = array_keys($data);
            $query = "UPDATE $this->table SET ";
            foreach($keys as $key){
                $query .= $key . ", ";
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
    }