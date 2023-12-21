<?php
include(__DIR__ . '/../../includes/header.php');
include(__DIR__ . '/../../app/models/Book.php');
use App\models\Book;

$bookss = new Book('', '', '', '', '', '', '', '', '');
$result = $bookss->getAllBookss();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>All Books</h1>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Book
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../app/controllers/admin/BookController.php" method="post"
                        enctype="multipart/form-data" class="shadow p-4 rounded mt-5"
                        style="width: 90%; max-width: 50rem;">

                        <h1 class="text-center pb-5 display-4 fs-3">
                            Add New Book
                        </h1>

                        <div class="mb-3">
                            <label class="form-label">Book Title</label>
                            <input type="text" class="form-control border" placeholder="Enter a title"
                                name="book_title">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Book Description</label>
                            <input type="text" class="form-control border" placeholder="Enter a description"
                                name="book_description">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Book Author</label>
                            <input type="text" class="form-control border" placeholder="Enter the author"
                                name="book_author">
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Book Genre</label>
                            <input type="text" class="form-control border" placeholder="Enter the genre of the book"
                                name="book_genre">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Publication Year</label>
                            <input type="date" class="form-control border" placeholder="Enter the year of publication"
                                name="publication_year">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Total Copies</label>
                            <input type="text" class="form-control border" placeholder="Enter..." name="total_copies">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Available Copies</label>
                            <input type="text" class="form-control border" placeholder="Enter..."
                                name="available_copies">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Book Cover </label>
                            <input type="file" class="form-control border" name="book_cover">
                        </div>

                        <div class="mb-3 ">
                            <label class="form-label"> File </label>
                            <input type="file" class="form-control border" name="file">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addBook">Add Book</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


<div class="pdf-list d-flex flex-wrap">
    <?php foreach ($result as $book) {
        var_dump($book);
        
        ?>
        <div class="card m-1">
            <img src="./../../uploades/<?php echo $book['cover']; ?>" alt="Book Cover">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $book['title']; ?>
                </h5>
                <p class="card-text">
                    <i><b>By:
                            <?php echo $book['author']; ?>
                            <br>
                        </b></i>

                <p>
                    <?php echo $book['genre']; ?>
                </p>
                <p>
                    <?php echo $book['publication_year']; ?>
                </p>
                <p>
                    <?php echo $book['total_copies']; ?>
                </p>
                <p>
                    <?php echo $book['available_copies']; ?>
                </p>


                <br></b></i>
                </p>
                <a href="uploads/files/<?= $book['file'] ?>" class="btn btn-success">Open</a>

                <a href="uploads/files/<?= $book['file'] ?>" class="btn btn-primary"
                    download="<?= $book['title'] ?>">Download</a>
            </div>
        </div>
    <?php } ?>
</div>



    <script src="../../public/js/bootstrap.bundle.min.js"></script>
</body>

</html>