<?php

namespace App\models;

use App\database\Database;

use PDOException;
use PDO;


require_once __DIR__ . '/../../vendor/autoload.php';

class Book{
    private $id;
    private $title;
    private $author;
    private $genre;
    private $description;
    private $publication_year;
    private $total_copies;
    private $available_copies;
    private $cover;
    private $connection;

    public function __construct($id, $title, $author, $genre, $description, $publication_year, $total_copies, $available_copies,$cover)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->description = $description;
        $this->publication_year = $publication_year;
        $this->total_copies = $total_copies;
        $this->available_copies = $available_copies;
        $this->cover = $cover;
        $DB = new Database();
        $this->connection = $DB->getConnection();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getGenre()
    {
        return $this->genre;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getPublicationYear()
    {
        return $this->publication_year;
    }
    public function getTotalcopies()
    {
        return $this->total_copies;
    }
    public function getAvailableCopies()
    {
        return $this->available_copies;
    }
    public function getCover()
    {
        return $this->cover;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setPublicationYear($publication_year)
    {
        $this->publication_year = $publication_year;
    }
    public function setTotalcopies($totalcopies)
    {
        $this->totalcopies = $totalcopies;
    }
    public function setAvailableCopies($available_copies)
    {
        $this->available_copies = $available_copies;
    }
    public function setCover($cover)
    {
        $this->cover = $cover;
    }
    
    public function addBook()
    {
       try{
          $query="INSERT INTO `book`(`title`,`author`,`genre`,`description`,`publication_year`,`total_copies`,`available_copies`,`cover`) VALUES (:title , :author , :genre , :description , :publication_year , :total_copies , :available_copies , :cover)";
          $stmt= $this->connection ->prepare($query);
          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':author', $this->author);
          $stmt->bindParam(':genre', $this->genre);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':publication_year', $this->publication_year);
          $stmt->bindParam(':total_copies', $this->total_copies);
          $stmt->bindParam(':available_copies', $this->available_copies);
          $stmt->bindParam(':cover', $this->cover);

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
    public function getAllBookss()
    {
       try {
           $query = "SELECT * FROM `book`";
           $stmt = $this->connection->prepare($query);
           $stmt->execute();
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getBookById()
{
    try {
        $query = "SELECT * FROM `book` WHERE id =:id";
    
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
public function getTotaleBooks()
{
    try {
        $query = "SELECT COUNT(id) as total_books FROM `book`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_books'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
public function getAllTheCopies()
{
    try {
        $query = "SELECT SUM(total_copies) as all_copies FROM `book`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['all_copies'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
public function getTotalAvailableCopie()
{
    try {
        $query = "SELECT SUM(available_copies) as available_copies FROM `book`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['available_copies'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function getAvailableBook()
{
    try {
        $query = "SELECT title, available_copies FROM `book`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

}