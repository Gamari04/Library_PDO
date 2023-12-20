<?php
require_once __DIR__ .'/../../vendor/autoload.php';
use App\models\User;
    session_start(); 
class AuthController 
{
        public function register($name,$lastname,$email,$password,$phone)
        {
            $hashedPassword = password_hash($password,PASSWORD_BCRYPT); 
            $user=new User($name,$lastname,$email,$hashedPassword,$phone);
            $user->create();
        }
        public function login($email,$password)
        {
           
            
            $user=new User(null,null,$email,null,null);
            $row=$user->getUserByEmail();
            if(isset($row)){
                if(password_verify($password,$row['password'])){
                    $_SESSION['email']=$row['email'];
                    header("Location: ../../index.php");
                    }
            }else{
                 echo"errors";
            }
        }
} 

if(isset($_POST["addUser"])){
     $name =$_POST['name'];
     $lastname =$_POST['lastname'];
     $email    =$_POST['email'];
     $password =$_POST['password'];
     $phone =$_POST['phone'];
          
     $auth = new AuthController ();
     $auth->register($name,$lastname,$email,$password,$phone);
           
    if ($auth) {
            
        header("Location: ../../views/login.php");
            
    } 
        
    }

    if(isset($_POST["login"])){
        $email    =$_POST['email'];
        $password =$_POST['password'];
        $auth = new AuthController();
        $auth->login($email,$password);
    }
 ?>


