<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\models\Book;

class BookController
{
    public function creatBook($title,$author,$genre,$description,$publication_year,$total_copies,$available_copies,$cover)
    {
        $book = new Book(null,$title,$author,$genre,$description,$publication_year,$total_copies,$available_copies,$cover);
        $result=$book->addBook();
       
        if ($result) {
                header("Location: ../../../views/admin/books.php");
                exit();
            } else {
                echo "Error during creating books";
            }
       
    }
    // public function getAllBooks($title,$author,$genre,$description,$publication_year,$total_copies,$available_copies,$cover)
    // {
    //     $book = new Book(null,$title,$author,$genre,$description,$publication_year,$total_copies,$available_copies,$cover);
    //     $result=$book->getAllBookss();
       
    //        if ($result) {
    //             header("Location: ../../../views/admin/books.php");
    //             exit();
    //         } else {
    //             echo "Error during creating books";
    //         }
    // }


}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["addBook"])) {
        $title = $_POST['book_title'];
        $author = $_POST['book_author'];
        $genre = $_POST['book_genre'];
        $description = $_POST['book_description'];
        $publication_year = $_POST['publication_year'];
        $total_copies = $_POST['total_copies'];
        $available_copies = $_POST['available_copies'];
      
           // Check if the 'book_cover' file was uploaded successfully
           if (isset($_FILES['book_cover']) && $_FILES['book_cover']['error'] === UPLOAD_ERR_OK) {
            // Access the uploaded file information
            $cover = $_FILES['book_cover']['name'];
            // Move the uploaded file to a desired directory
            move_uploaded_file($_FILES['book_cover']['tmp_name'], '../../../uploades/' . $cover);
        } else {
            // Handle the case where the 'book_cover' file upload failed
            $cover = ''; // or set a default value
        }

        $books= new BookController();
        $books->creatBook($title,$author,$genre,$description,$publication_year,$total_copies,$available_copies,$cover);
    }
}
// $bookss = new BookController();
// $bookss->getAllBooks($title,$author,$genre,$description,$publication_year,$total_copies,$available_copies,$cover);

$book = new Book(null,$title,$author,$genre,$description,$publication_year,$total_copies,$available_copies,$cover);
$result=$book->searchBooks($key);