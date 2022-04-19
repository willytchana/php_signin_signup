<?php 
    class Sql{
        private $connection;

        public function __construct(){
            $this->connection = new PDO(
                "mysql:host=localhost;dbname=php1_db;charset=utf8",
                "root",
                ""
            );
        }

        private function getStatement($query, $params){
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }

        public function execute($query, $params){
            $statement = $this->getStatement($query, $params);
            $id = $this->connection->lastInsertId();
            return $id;
        }

        public function read($query, $params){
            $statement = $this->getStatement($query, $params);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }