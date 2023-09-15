<?php

declare(strict_types=1);

namespace TestProjekt\DB;


class DB
{
  public function __construct()
  {
  }
  public function fetchSingle($sql)
  {
    require(__DIR__ . '/../config.php');
    $stmt = prepareStatement($sql);
    if ($stmt) {
      // Execute the prepared statement
      $stmt->execute();
      // Fetch results
      $array = $stmt->fetch(\PDO::FETCH_UNIQUE | \PDO::FETCH_ASSOC);
      return $array;
      // Free the statement
      $stmt->closeCursor();
    } else {
      echo "An error occurred while connecting to the database. Please try again later.";
    }
  }
  public function fetchAll($sql)
  {
    require(__DIR__ . '/../config.php');
    $stmt = prepareStatement($sql);
    if ($stmt) {
      // Execute the prepared statement
      $stmt->execute();
      // Fetch results
      //$array = $stmt->fetchAll(\PDO::FETCH_UNIQUE | \PDO::FETCH_ASSOC);

      $array = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      return $array;
      // Free the statement
      $stmt->closeCursor();
    } else {
      echo "An error occurred while connecting to the database. Please try again later.";
    }
  }
}
