<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\models\User;
session_start();

class AuthController
{
    public function register($name, $lastname, $email, $password, $phone)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($name, $lastname, $email, $hashedPassword, $phone);
        $result = $user->create();

        if ($result) {
            header("Location: ../../views/login.php");
            exit();
        } else {
            echo "Error during registration";
        }
    }

    public function login($email, $password)
    {
        $user = new User(null, null, $email, null, null);
        $row = $user->getUserByEmail();

        if (isset($row) && password_verify($password, $row['password'])) {
            // $_SESSION['email'] = $row['email'];
            header("Location: ../../index.php");
            exit();
        } else {
            echo "Invalid email or password";
        }
    }
}

// Check for form submissions
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["addUser"])) {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        $auth = new AuthController();
        $auth->register($name, $lastname, $email, $password, $phone);
    }

    if (isset($_POST["login"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $auth = new AuthController();
        $auth->login($email,$password);
    }


}
       
?>