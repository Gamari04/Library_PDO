<?php
namespace App\database;
require_once __DIR__ .'/../../vendor/autoload.php';
use PDO;
use PDOException;
use App\database\Dotenv\Dotenv;
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();


class Database {
    private $connection;

    public function __construct() {
        try {

            $dsn = 'mysql:host=' . $_ENV['DB_SERVERNAME'] . ';dbname=' . $_ENV['DB_NAME'];
            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];

        
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "workssssss";
        } catch (PDOException $e) {
            echo "doesn't work: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}


$DB = new Database();
$pdo = $DB->getConnection();

?>


