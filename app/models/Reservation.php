<?php 
namespace App\models;

use App\database\Database;

use PDOException;
use PDO;


require_once __DIR__ . '/../../vendor/autoload.php';


class Reservation
{
 private $description;
 private $reservation_date;
 private $return_date;
 private $is_returned;

public function __construct($description, $reservation_date, $return_date, $is_returned)
{
    $this->description = $description;
    $this->reservation_date = $reservation_date;
    $this->return_date = $return_date;
    $this->is_returned = $is_returned;
}

public function getDescription()
{
    return $this->description;
}
public function getReservationDate()
{
    return $this->reservation_date;
}
public function getReturnDate()
{
    return $this->return_date;
}
public function getIsReturned()
{
    return $this->is_returned;
}
public function setDescription($description)
{
    $this->description = $description;
}
public function setReservationDate($reservation_date)
{
    $this->reservation_date = $reservation_date;
}
public function setReturnDate($return_date)
{
    $this->return_date = $return_date;
}
public function setIsReturned($is_returned)
{
    $this->is_returned = $is_returned;
}

}
?>