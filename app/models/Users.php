<?php
require_once __DIR__ . '/../../config/database.php';

class Users {
    private $conn;
    private $table = "usersMVC";

    public function __construct() {
        $this->conn = (new Database())->conn;
    }

    public function create($userData) {
        try {
            $checkMail= "SELECT * FROM usersMVC WHERE email =:email";
            $stmt = $this->conn->prepare($checkMail);
            $stmt->bindParam(":email",$userData['email']);
            $stmt->execute();
            if ($stmt->rowCount() > 0) { 
                header("Location: create.php?error=Email already exists");
                exit;
            } 

            $sql = "INSERT INTO $this->table (name, email, contact, dob, address, about, password, image) 
                    VALUES (:name, :email, :contact, :dob, :address, :about, :password, :image)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":name", $userData['name']);
            $stmt->bindParam(":email", $userData['email']);
            $stmt->bindParam(":contact", $userData['contact']);
            $stmt->bindParam(":dob", $userData['dob']);
            $stmt->bindParam(":address", $userData['address']);
            $stmt->bindParam(":about", $userData['about']);
            $stmt->bindParam(":password", $userData['password']);
            $stmt->bindParam(":image", $userData['image']);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
    public function loginNow($loginData){
        // echo"<pre>";
        // print_r($loginData);die;
        try {
            $checkUser = "SELECT * FROM usersMVC WHERE email=:email";
            $stmt = $this->conn->prepare($checkUser);
            $stmt->bindParam(":email", $loginData['email']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // echo "<pre>";
            //     print_r($user);die; 

    
           
            if ($user && password_verify($loginData['password'], $user['password'])) {
                // echo "<pre>";
                // print_r($user);die; 
                return $user;
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
    


    public function getAll() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return [];
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return null;
        }
    }
}
?>
