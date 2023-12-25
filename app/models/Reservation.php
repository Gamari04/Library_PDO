<?php 
namespace App\models;

use App\database\Database;

use PDOException;
use PDO;


require_once __DIR__ . '/../../vendor/autoload.php';


class Reservation
{
 private $id;
 private $description;
 private $reservation_date;
 private $return_date;
 private $is_returned;
 private $connection;
private $userId;
private $bookId;

public function __construct($id,$description, $reservation_date, $return_date,$is_returned,$userId, $bookId)
{
    $this->id = $id;
    $this->description = $description;
    $this->reservation_date = $reservation_date;
    $this->return_date = $return_date;
    $this->is_returned = $is_returned;
    $DB = new Database();
    $this->connection = $DB->getConnection();
    $this->userId = $userId;    
    $this->bookId = $bookId;

}

public function getId()
{
    return $this->id;
}
public function getUserId()
{
    return $this->userId;
}
public function getBookId()
{
    return $this->bookId;
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


public function setId($id)
{
    $this->id = $id;
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
public function setUserId($userId)
{
    $this->userId = $userId;
}
public function setBookId($bookId)
{
    $this->bookId = $bookId;
}

public function addReservation()
{
    try{
        $query="INSERT INTO `reservation`(`description`,`reservation_date`,`return_date`,`is_returned`,`user_id`,`book_id`) VALUES (:description , :reservation_date , :return_date ,:is_returned ,:userId , :bookId)";
        $stmt= $this->connection ->prepare($query);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':reservation_date', $this->reservation_date);
        $stmt->bindParam(':return_date', $this->return_date);
        $stmt->bindParam(':is_returned', $this->is_returned);
        $stmt->bindParam(':userId', $this->userId);
        $stmt->bindParam(':bookId', $this->bookId);
     
         
        $result = $stmt->execute();
        if($result){
          return true;
        }else{
          return false;
        }
     } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
      }
}
public function getReservation()
{
    try{
        $query= "SELECT * FROM `reservation`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
     } catch (PDOException $e) {
         echo "Error: " . $e->getMessage();
         return false;
     }
}
public function deleteReservation($id) {
    try {
        $query = "DELETE FROM `reservation` WHERE `id` = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
}
?>