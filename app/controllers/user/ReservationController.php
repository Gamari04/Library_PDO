<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\models\Reservation;
session_start();
class ReservationController
{
    public function newReservation($description, $reservation_date, $return_date,$is_returned, $userId, $bookId)
    {
        $reservation = new Reservation(null,$description, $reservation_date, $return_date,$is_returned, $userId, $bookId);
        $result=$reservation->addReservation();
       
        if ($result) {
            header("Location: ../../../views/user/allReservation.php");
            exit();
        } else {
            echo "Error during reservation";
        }
            
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["reserve"])) {
        $description = $_POST['resrvationDescription'];
        $reservation_date = $_POST['reservationDate'];
        $return_date = $_POST['returnDate'];
        $currentDate = date('Y-m-d');
        if ($return_date == $currentDate) {
              $is_returned = 'Yes' ;
        } else  {
            $is_returned = 'No' ;
        }
        $bookId=$_SESSION['id'];
        $userId=$_SESSION['user_id'];
        $reservation = new ReservationController();
        $reservation->newReservation($description, $reservation_date, $return_date,$is_returned, $userId, $bookId);
        

    }
}