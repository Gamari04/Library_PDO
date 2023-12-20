<?php
namespace App\models;
use App\database\Database;
require_once __DIR__ .'/../../vendor/autoload.php';
use PDO;
use PDOException;



class User
{
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $phone;
    private $connection;
   

    public function __construct($name,$lastname, $email, $password, $phone)
    {
        $this->fullname = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $DB = new Database();
        $this->connection = $DB->getConnection();
        
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->name = $lastname;
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
    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;

    }

    public function create()
    {
        $query_user = "INSERT INTO `user`(`Name`,`Last name`, `email`,`password`,`phone`) VALUES (:name, :lastname, :email, :password , :phone)";
        $stmt_user = $this->connection->prepare($query_user);
        $stmt_user->bindParam(':name', $this->name);
        $stmt_user->bindParam(':lastname', $this->lastname);
        $stmt_user->bindParam(':email', $this->email);
        $stmt_user->bindParam(':password', $this->password);
        $stmt_user->bindParam(':phone', $this->phone);
        
        try{
            $result_user = $stmt_user->execute();
            if($result_user) {
                $user_id = $this->connection->lastInsertId();

                $query_role = "INSERT INTO `user_role` (`user_id`, `role_id`) VALUES (:user_id,2 )";
                $stmt_role =  $this->connection->prepare($query_role);
                $stmt_role->bindParam(':user_id', $user_id);
        
                $result_role = $stmt_role->execute();
                   if($result_role) {
                   return $result_user;
                   }
            }
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }   
    }
    public function getUserByEmail()
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