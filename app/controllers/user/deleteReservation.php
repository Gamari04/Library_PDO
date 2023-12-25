<?php
require_once "../../models/Reservation.php";
use App\models\Reservation;


if(isset($_GET["id"])){
    $id = $_GET["id"];
    $reservations = new Reservation('','', '', '', '', '','');
    $result = $reservations->deleteReservation($id);
    if($result){
        header("Location: ../../../views/user/allReservation.php");
        exit();
    }else{
        echo"error during delete";
    }
}

?>