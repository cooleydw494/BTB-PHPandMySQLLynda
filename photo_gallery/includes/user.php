<?php
//we're going to need the database
require_once '../includes/database.php';

class User {

  public static function find_all() {
    $result_set = self::find_by_sql('SELECT * FROM users');
    return $result_set;
  }

  public static function find_by_id($id=0) {
    global $database;
    $result_set = self::find_by_sql("SELECT * FROM users WHERE id = {$id}");
    $found = $database->fetch_array($result_set);
    return $found;
  }

  public static function find_by_sql($sql = '') {
    global $database;
    $result_set = $database->query($sql);
    return $result_set;
  }
}
