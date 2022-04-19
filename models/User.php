<?php
    class User{
        public $id;
        public $email;
        public $password;
        public $fullname;

        public function __construct($id, $email, $password, $fullname){
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->fullname = $fullname;
        }
    }