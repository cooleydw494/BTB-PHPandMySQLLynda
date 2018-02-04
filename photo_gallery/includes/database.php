<?php

require_once('config.php');

class MySQLDatabase {

  private $connection;

  public function __construct() {
    $this->open_connection();
  }

  public function open_connection() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connection_errno()) {
      die('Database Connection Failed: ' . mysqli_connection_err() . ' (' . mysqli_connection_errno() . ')');
    }
  }

  public function close_connection() {
    if (isset($this->connection)) {
      mysqli_close($this->connection);
      unset($this->connection);
    }
  }

  public function query($sql) {
    $result = mysqli_query($this->connection, $sql);
    $this->confirm_query($result);
    return $result;
  }

  public function mysql_prep($string) {
    $escaped_string = mysqli_real_escape_string($this->connection, $string);
    return $escaped_string;
  }

  private function confirm_query($result) {
    if (!$result) {
      die('Database Query Failed :(');
    }
  }

}

$database = new MySQLDatabase();
//if you want to have this and a shorter reference
$db =& $database;
