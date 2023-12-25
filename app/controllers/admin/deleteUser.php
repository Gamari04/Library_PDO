<?php
require_once "../../models/User.php";
use App\models\User;


if(isset($_GET["id"])){
    $id = $_GET["id"];
    $reservations = new User('','', '', '', '', '');
    $result = $reservations->deleteUser($id);
    if($result){
        header("Location: ../../../views/admin/adminPannel.php");
        exit();
    }else{
        echo"error during delete";
    }
}

?>