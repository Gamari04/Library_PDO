<?php

require_once __DIR__ .'/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();


class Database {
    private $connection;

    public function __construct() {
        try {
            // Utilisation des variables d'environnement pour la configuration de la connexion
            $dsn = 'mysql:host=' . $_ENV['DB_SERVERNAME'] . ';dbname=' . $_ENV['DB_NAME'];
            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];

            // Création de l'instance de PDO
            $this->connection = new PDO($dsn, $username, $password);

            // Configuration de PDO pour générer des exceptions en cas d'erreur
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

// Utilisation de la classe Database
$DB = new Database();
$pdo = $DB->getConnection();

?>


