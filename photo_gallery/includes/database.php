<?php

require_once('config.php');

class MySQLDatabase {

  private $connection;

  public function __construct() {
    $this->open_connection();
  }

  public function open_connection() {
    $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()) {
      die('Database Connection Failed: ' . mysqli_connect_err() . ' (' . mysqli_connect_errno() . ')');
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

  public function escape_value($string) {
    $escaped_string = mysqli_real_escape_string($this->connection, $string);
    return $escaped_string;
  }

  private function confirm_query($result) {
    if (!$result) {
      die('Database Query Failed :(');
    }
  }

  public function fetch_array($result_set) {
    return mysqli_fetch_array($result_set);
  }

  public function num_rows($result_set) {
    return mysqli_num_rows($result_set);
  }

  public function insert_id() {
    //get the last inserted ID over the current DB connection
    return mysqli_insert_id($this->connection);
  }

  public function affected_rows() {
    return mysqli_affected_rows($this->connection);
  }

}

$database = new MySQLDatabase();
//if you want to have this and a shorter reference
$db =& $database;
