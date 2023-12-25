<?php
include(__DIR__ .'/../../includes/header.php');
include(__DIR__ . '/../../app/models/Book.php');
use App\models\Book;
$bookss = new Book('', '', '', '', '', '', '', '', '');
$row = $bookss->getAvailableBook();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table">
  <thead>
  
    <tr>
   
      <th scope="col">Title of The Book</th>
      <th scope="col">Available Copies</th>
    </tr>
  </thead>
  <?php foreach($row as $row1) :?>
  <tbody>
    <tr>
      <td><?php echo $row1['title']?></td>
      <td><?php echo $row1['available_copies']?></td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>