<?php

    class User extends Model{
        public function isValid($data = []){
            if ($this->isExists($data, 'username')){
                $this->errors['username'] = 'Username already exists!';
            }
            if ($this->isExists($data, 'email')){
                $this->errors['email'] = 'Email already exists!';
            }

            if (count($this->errors) == 0){
                return true;
            }
            return false;
        }
    }