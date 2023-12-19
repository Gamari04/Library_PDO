<?php
require __DIR__ .'../../database/connection.php';

class User
{
    private $fullname;
    private $email;
    private $password;
    private $connection;

    public function __construct($fullname, $email, $password)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $DB = new Database();
        $this->connection = $DB->getConnection();
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function create()
    {
        $query = "INSERT INTO `user`(`name`, `email`,`password`) VALUES (:fullname, :email, :password)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':fullname', $this->fullname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        
        try {
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function view()
    {
        $query = "SELECT * FROM `user` WHERE email = :email";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}

?>