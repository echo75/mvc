<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Include Composer's autoloader

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

function prepareStatement($sql)
{
    $dbHost = $_ENV['DB_HOST'];
    $dbName = $_ENV['DB_NAME'];
    $dbUser = $_ENV['DB_USER'];
    $dbPass = $_ENV['DB_PASS'];

    try {
        $pdo = new \PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4", $dbUser, $dbPass, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES => false
        ]);
        //echo "Verbindung erfolgreich";
        $stmt = $pdo->prepare($sql);

        return $stmt;
    } catch (\PDOException $e) {
        // Log the error or handle it as needed
        error_log("Database Connection Error: " . $e->getMessage());
        // Throw a custom exception here or return null
        return null;
    }
}
