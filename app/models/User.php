<?php

namespace App\models;

use App\database\Database;
use PDO;
use PDOException;
use Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class User
{
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $phone;
    private $connection;

    public function __construct($name, $lastname, $email, $password, $phone)
    {
        $this->name = $name;
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
        $this->lastname = $lastname;
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
        try {
            $query_user = "INSERT INTO `user`(`Name`, `Last name`, `email`, `password`, `phone`) VALUES (:name, :lastname, :email, :password, :phone)";
            $stmt_user = $this->connection->prepare($query_user);
            $stmt_user->bindParam(':name', $this->name);
            $stmt_user->bindParam(':lastname', $this->lastname);
            $stmt_user->bindParam(':email', $this->email);
            $stmt_user->bindParam(':password',$this->password);
            $stmt_user->bindParam(':phone', $this->phone);

            $result_user = $stmt_user->execute();

            if ($result_user) {
                $user_id = $this->connection->lastInsertId();

                $query_role = "INSERT INTO `user_role` (`user_id`, `role_id`) VALUES (:user_id, 2)";
                $stmt_role = $this->connection->prepare($query_role);
                $stmt_role->bindParam(':user_id', $user_id);

                $result_role = $stmt_role->execute();

                if ($result_role) {
                    return true;
                } else {
                    throw new Exception("Error inserting user role");
                }
            } else {
                throw new Exception("Error inserting user");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getUserByEmail()
    {
        try {
            $query = "SELECT u.*, ur.role_id, r.name FROM user AS u
             INNER JOIN user_role AS ur ON u.id = ur.user_id 
             INNER JOIN role AS r ON ur.role_id = r.id WHERE email=:email";
        
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    // public function deleteUser()
    // {
    //     try {


    //        }
    // }
}
?>
