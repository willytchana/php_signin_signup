<?php 
   require_once "Sql.php";
   require_once "../Models/User.php";
   class UserRepository{
        private $sql;

        public function __construct(){
            $this->sql = new Sql();
        }

        public function add($user){
            $query = "INSERT INTO `user` (`email`, `password`, `fullname`) ";
            $query .= "VALUES (:email, :password, :fullname)";
            $params = [
                "email" => $user->email,
                "password" => md5($user->password),
                "fullname" => $user->fullname
            ];
            $user->id = $this->sql->execute($query, $params);
            $user->password = md5($user->password);
            return $user;
        }

        public function getById($id){
            $query = "SELECT * FROM `user` ";
            $query .= "WHERE `id` = :id";
            $params = [
                "id" => $id
            ];
            $data = $this->sql->read($query, $params);
            if(count($data) > 0)
                return new User($data[0]['id'], $data[0]['email'], $data[0]['password'], $data[0]['fullname']);
            return NULL;
        }

        public function getByEmail($email){
            $query = "SELECT * FROM `user` ";
            $query .= "WHERE `email` = :email";
            $params = [
                "email" => $email
            ];
            $data = $this->sql->read($query, $params);
            if(count($data) > 0)
                return new User($data[0]['id'], $data[0]['email'], $data[0]['password'], $data[0]['fullname']);
            return NULL;
        }

        public function getAll(){
            $query = "SELECT * FROM `user`";
            $params = [];
            $data = $this->sql->read($query, $params);
            $users = array();
            if(count($data) > 0)
                foreach($data as $key => $row)
                    array_push($users, new User($row['id'], $row['email'], $row['password'], $row['fullname']));
            return $users;
        }
    }