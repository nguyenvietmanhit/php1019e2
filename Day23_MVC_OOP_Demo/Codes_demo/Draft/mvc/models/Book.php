<?php
require_once 'Model.php';

class Book extends Model
{
  const TABLE_NAME = 'employees';
  public $connection;


  public function __construct()
  {
    $this->connection = $this->openConnect();
  }

  public function getBooks()
  {
    $querySelect = "SELECT * FROM " . self::TABLE_NAME;
    $results = mysqli_query($this->connection, $querySelect);
    $books = [];
    if (mysqli_num_rows($results) > 0) {
      $books = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    $this->closeConnect($this->connection);
    return $books;
  }
}