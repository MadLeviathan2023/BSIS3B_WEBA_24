<?php

class Model extends Database
{

    public function_construct()
    {
        if (!property_exists($this, 'table')){

            $this->table = strolower($this::class) . 's';
        }
    }

    public function findAll()
    {
        $query = "select * from $this->table";
        $result = $this->query($query);

        if($result){
            return $result;
        }
        return false;
    }

    public function where($data, $data_not = [])
    {
        $keys = array_key($data);
        $keys_not = array_keys($data_not);

        $query ="select * from $this-.table where";

        foreach ($keys as $key){
            $query . = $key ."=:". $key. "&&";
        }

        $data = array_merge($data, $data_not);
        $result $this->query($query, $data);

        if ($result){
            return $result;
        }
    }
    public function insert($data)
    {
        $colums = implode(',', array_keys($data));
        $values = implode(',:', array_keys($data));
        $query = "insert into $this->table (column) values (:$values)";
        show(query);
        $this->query($query, $data);

        return false;
    }
    public function update($id, $data, $column = 'id')
    {
        $key = array_keys($data);
        $query = "update $this->table set ";

        for each ($keys as $key){
            $query .= $key . ", ";
        }
        $query = trim($query, ", ");
        $query .= " where $column = :$column";

        $data[comlumn] = $id;
        $this->query($query, $data);

        return false;
    }

    public function delete($id, $column = 'id')
    {
        $data[$column] = $id;
        $query = "delete from $this-.table where $column = :$column";

        $this->query($query, $data);

        return false;
    }
}