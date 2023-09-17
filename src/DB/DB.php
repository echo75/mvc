<?php

declare(strict_types=1);

namespace TestProject\DB;

use Dotenv\Dotenv; // Import the Dotenv namespace

require_once __DIR__ . '/../../vendor/autoload.php'; // Include Composer's autoloader

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class DB
{
  private $pdo;

  public function __construct()
  {
    $dbHost = $_ENV['DB_HOST'];
    $dbName = $_ENV['DB_NAME'];
    $dbUser = $_ENV['DB_USER'];
    $dbPass = $_ENV['DB_PASS'];

    // Establish a database connection using PDO
    $this->pdo = new \PDO(
      "mysql:host={$dbHost};dbname={$dbName}",
      $dbUser,
      $dbPass,
      [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
    );
  }

  public function fetchSingle($sql, $params = [])
  {
    try {
      $stmt = $this->pdo->prepare($sql);

      // Bind parameters if provided
      foreach ($params as $param => $value) {
        $stmt->bindValue($param, $value);
      }

      // Execute the prepared statement
      $stmt->execute();

      // Fetch a single row as an associative array
      $result = $stmt->fetch(\PDO::FETCH_ASSOC);

      // Close the cursor
      $stmt->closeCursor();

      return $result;
    } catch (\PDOException $e) {
      echo "An error occurred while executing the query: " . $e->getMessage();
      return false;
    }
  }

  public function fetchAll($sql, $params = [])
  {
    try {
      $stmt = $this->pdo->prepare($sql);

      // Bind parameters if provided
      foreach ($params as $param => $value) {
        $stmt->bindValue($param, $value);
      }

      // Execute the prepared statement
      $stmt->execute();

      // Fetch a single row as an associative array
      $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // Close the cursor
      $stmt->closeCursor();

      return $result;
    } catch (\PDOException $e) {
      echo "An error occurred while executing the query: " . $e->getMessage();
      return false;
    }
  }
}
