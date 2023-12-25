<?php
include(__DIR__ . '/../../includes/sidebarUser.php');
include(__DIR__ . '/../../app/models/Book.php');
// session_start();
$id = $_GET["id"];
$_SESSION['id']= $id;
use App\models\Book;

$bookss = new Book($id, $title, $author, $genre, $description, $publication_year, $total_copies, $available_copies,$cover);
$row = $bookss->getBookById();

?>
<div class="pdf-list d-flex justify-content--start flex-wrap">
<div class="col-3  ">
            <img src="../../uploades/<?php echo $row['cover']; ?>" class="w-50" alt="Book Cover">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $row['title']; ?>
                </h5>
                <p class="card-text">
                    <i><b>By:
                            <?php echo $row['author']; ?>
                            <br>
                        </b></i>
                <p>
                  Genre : <?php echo $row['genre']; ?>
                </p>
                <p>
                  Publication Year : <?php echo $row['publication_year']; ?>
                </p>
                <p>
                   Total Copies : <?php echo $row['total_copies']; ?>
                </p>
                <p>
                  Available Copies : <?php echo $row['available_copies']; ?>
                </p>
                <!-- <a href="uploads/files/<?= $row['file'] ?>" class="btn btn-success">Open</a>

                <a href="uploads/files/<?= $row['file'] ?>" class="btn btn-primary"
                    download="<?= $row['title'] ?>">Download</a> -->
                    <!-- <a class="btn btn-dark btn-sm " href="views/user/reserveBook.php?id=">Reserve Now</a>
                    -->
            </div>
            </div> 
        <form action="../../app/controllers/user/ReservationController.php" method="post"
                        enctype="multipart/form-data" class="shadow p-4 rounded mt-5"
                        style="width: 90%; max-width: 50rem;">

                        <h1 class="text-center pb-5 display-4 fs-3">
                           Reserve Book
                        </h1>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control border" placeholder="Enter a description"
                                name="resrvationDescription">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Reservation Date</label>
                            <input type="date" class="form-control border" placeholder="Enter the year of publication"
                                name="reservationDate">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Return Date</label>
                            <input type="date" class="form-control border" placeholder="Enter the year of publication"
                                name="returnDate">
                        </div>
                        
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="submit" class="btn btn-primary" name="reserve">Reserve Now</button>
                        </div>
                    </form>   
                   
                    </div> 