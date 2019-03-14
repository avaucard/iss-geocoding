<?php
    class PDOConnection{

        private static $instance = null;

        const USER = "<user>";
        const PASSWORD = "<password>";
        const DNS = 'mysql:host=<host>;dbname=<dbname>';

        public static function connectDB(){
            try{
                self::$instance = new PDO(self::DNS, self::USER, self::PASSWORD,  array( PDO::ATTR_TIMEOUT => 100, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->query("SET NAMES UTF8");
                return self::$instance;
            
            }catch (PDOException $e){
                die($e->getMessage());
                echo $e;
                return null;
            }
        }

        public static function disconnectDB(){
            self::$instance = null;
        }
    }
?>