<?php
    class User{
        private $id;
        private $email;
        private $password;
        private $fullname;

        public __construct($id, $email, $password, $fullname){
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->fullname = $fullname;
        }

        public function getId(){ return $this->id; }
        public function getEmail(){ return $this->email; }
        public function getPassword(){ return $this->password; }
        public function getFullname(){ return $this->fullname; }

        public function setId($value) { $this->id = $value; }
        public function setEmail($value) { $this->email = $value; }
        public function setPassword($value) { $this->password = $value; }
        public function setFullname($value) { $this->fullname = $value; }
    }