<?php
    require_once 'PDOConnection.php';

    class DBConnection {
        protected $connection;

        public function connectDB(){
            $this->connection = PDOConnection::connectDB();
        }

        public function disconnectDB(){
            $this->connection = PDOConnection::disconnectDB();
        }
    }
?>