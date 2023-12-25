<?php
include(__DIR__ . '/../../includes/sidebarUser.php');
include(__DIR__ . '/../../app/models/Reservation.php');
use App\models\Reservation;

// include(__DIR__ . '../app/models/Book.php');
// use App\models\Book;

$reservations = new Reservation('','', '', '', '', '','');
$result = $reservations->getReservation();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table id="fresh-table" class="table">
    <thead>
      <th data-field="User Id">User Id</th>
      <th data-field="Book Id">Book Id</th>
      <th data-field="Description">Description</th>
      <th data-field="Reservation Date">Reservation Date</th>
      <th data-field="Return Date">Return Date</th>
      <th data-field="is_returned">is_returned</th>
      
      
    </thead>
    <tbody>
    <?php foreach($result as $result1) :?>
      <tr>
        <td><?php echo $result1['user_id']?></td>
        <td><?php echo $result1['book_id']?></td>
        <td><?php echo $result1['description']?></td>
        <td><?php echo $result1['reservation_date']?></td>
        <td><?php echo $result1['return_date']?></td>
        <td><?php echo $result1['is_returned']?></td>
        <!-- <td><button  class="btn btn-default"><a href="edit.php?id=<?= $row['id']?>">Edit</a></button></td> -->
        <td><a class="btn btn-link text-dark px-3 mb-0" href="../dashboard/edit.php?id=<?= $result1['id']?>"><i class="material-icons text-sm me-2">edit</i>Edit</a></td>
        <td><button  class="btn btn-default"><a href="../../app/controllers/user/deleteReservation.php?id=<?= $result1['id']?>"><lord-icon
    src="https://cdn.lordicon.com/skkahier.json"
    trigger="hover"
    style="width:30px;height:30px">
</lord-ico></a></button></td>
  </div>
      </tr>
      
      <?php endforeach; ?>
    </tbody>
  </table>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>
</body>
</html>