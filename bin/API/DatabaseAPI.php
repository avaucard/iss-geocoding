<?php
require_once '../bin/PDO/DBConnection.php';

class DatabaseAPI extends DBConnection{

    public function connectUser($username, $password){
        $this->connectDB();
        $password = hash('sha256', $password);
        $stmt = $this->connection->prepare("SELECT id, username, firstname, surname, email, city, zip_code, country FROM users where username = :username AND password = :password");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        while ($result = $stmt->fetch(PDO::FETCH_OBJ)) {
            if (!empty($result)) {
                $_SESSION['id'] = $result->id;
                $_SESSION['username'] = $result->username;
                $_SESSION['firstname'] = $result->firstname;
                $_SESSION['surname'] = $result->surname;
                $_SESSION['email'] = $result->email;
                $_SESSION['city'] = $result->city;
                $_SESSION['zip_code'] = $result->zip_code;
                $_SESSION['country'] = $result->country;
                
                header('Location: ../pages/home.php');
                exit;
            }
            else {
                header('Location: ../index.php?error=1');
                exit;
            }
        }
        $this->disconnectDB();
    }

    public function addUser($username, $email, $firstname, $surname, $password, $city, $zip_code, $country){
        $this->connectDB();    
        $password = hash('sha256', $password);     
        

        // prepare sql and bind parameters
        $stmt = $this->connection->prepare("INSERT INTO users (username, email, firstname, surname, password, city, zip_code, country) 
        VALUES (:username, :email, :firstname, :surname, :password, :city, :zip_code, :country)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':city', $city);
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

    public function selectLongLat() {
        $this->connectDB();
    
        $sql="SELECT 
                firstname,
                surname,
                city,
                zip_code,
                country
                FROM 
                users";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        $tab=array();
        while($result = $stmt->fetch(PDO::FETCH_OBJ)){
            // var_dump($result);
            $city = urlencode($result->city);
            // $zip_code = urlencode($result->zip_code);
            $country = urlencode($result->country);
            $useragent = $_SERVER['HTTP_USER_AGENT'];

            $opts = [
                'http' => [
                    'method'=>"GET",
                    'header'=>"User-Agent: {$useragent} \r\n"
                ]
            ];

            $context = stream_context_create($opts);

            $request = file_get_contents("https://nominatim.openstreetmap.org/search?city={$city}&country={$country}&format=json&polygon=1&addressdetails=1", false, $context);
            $longlat = json_decode($request);
            
            array_push($tab, (object) array('name' => $result->firstname, 'latitude'=>$longlat[0]->lat,'longitude'=> $longlat[0]->lon));
            
        }         
        $this->disconnectDB();
        
        $tab = count($tab) > 0 ? $tab : null; 
        return $tab;
    }
}

?>