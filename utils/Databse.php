<?php
// Connect to MYSQL Database
class Database
{
  public $connection;

  public function __construct()
  {
    $dsn = "mysql:host=localhost;dbname=inventoDB;charset=utf8mb4";
    $username = "root";
    $password = "ULTRAmysql87##";
    $this->connection = new PDO($dsn, $username, $password);
  }

  public function query($useQuery)
  {

    $query_statement = $this->connection->prepare($useQuery);
    $query_statement->execute();

    return $query_statement;
  }
}
