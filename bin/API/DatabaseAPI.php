<?php

    require_once '../bin/PDO/DBConnection.php';

    class DatabaseAPI extends DBConnection{

        public function connectUser($username, $password){
            $this->connectDB();
            $password = hash('sha256', $password);
            $stmt = $this->connection->prepare("SELECT id, username, firstname, surname, email, address, zip_code, country FROM users where username = :username AND password = :password");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_OBJ);
            var_dump($result);

            $this->disconnectDB();

            if (!empty($result)) {
                while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                    session_start();
                    $_SESSION['id'] = $result->id;
                    $_SESSION['username'] = $result->username;
                    $_SESSION['password'] = $result->password;
                    $_SESSION['firstname'] = $result->firstname;
                    $_SESSION['surname'] = $result->surname;
                    $_SESSION['email'] = $result->email;
                    $_SESSION['address'] = $result->address;
                    $_SESSION['zip_code'] = $result->zip_code;
                    $_SESSION['country'] = $result->country;
                }
                header('Location: ../pages/home.php');
            }
            else {
                header('Location: ../index.php?error=1');
            }
        }

        public function addUser($username, $email, $firstname, $surname, $password, $address, $zip_code, $country){
            $this->connectDB();    
            $password = hash('sha256', $password);     
            

            // prepare sql and bind parameters
            $stmt = $this->connection->prepare("INSERT INTO users (username, email, firstname, surname, password, address, zip_code, country) 
            VALUES (:username, :email, :firstname, :surname, :password, :address, :zip_code, :country)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':zip_code', $zip_code);
            $stmt->bindParam(':country', $country);

            try {
                $stmt->execute();
                header('Location: ../index.php');
            } catch (Exception $e) {
                echo($e);
                header('Location: ../pages/signup.php?error=1');
            }
            
            $this->disconnectDB();
        }
    }