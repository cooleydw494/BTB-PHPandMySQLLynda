<?php
//we're going to need the database
require_once 'database.php';

class User {

  public $id;
  public $username;
  public $password;
  public $first_name;
  public $last_name;

  public static function find_all() {
    $result_set = self::find_by_sql('SELECT * FROM users');
    return $result_set;
  }

  public static function find_by_id($id=0) {
    global $database;
    $result_array = self::find_by_sql("SELECT * FROM users WHERE id = {$id}");
    return !empty($result_array) ? array_shift($result_array) : false;
  }

  public static function find_by_sql($sql = '') {
    global $database;
    $result_set = $database->query($sql);
    $object_array = [];
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
    }
    return $object_array;
  }

  public static function authenticate($username = '', $password = '') {
    global $database;
    $username = $database->escape_value($username);
    $password = $database->escape_value($password);

    $sql = "SELECT * FROM users ";
    $sql .= "WHERE username = '{$username}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";

    $result_array = self::find_by_sql($sql);
    return !empty($result_array) ? array_shift($result_array) : false;
  }

  public function full_name() {
    if (isset($this->first_name) && isset($this->last_name)) {
      return $this->first_name . ' ' . $this->last_name;
    } else {
      return '';
    }
  }

  private static function instantiate($record) {
    $object = new self;

    // long form approach (not great if you have many attributes)
    // $object->id = $record['id'];
    // $object->username = $record['username'];
    // $object->password = $record['password'];
    // $object->first_name = $record['first_name'];
    // $object->last_name = $record['last_name'];

    //more dynamic short-form approach
    foreach($record as $attribute => $value) {
      if ($object->has_attribute($attribute)) {
        $object->$attribute = $value;
      }
    }

    return $object;
  }

  private function has_attribute($attribute) {
    // get_object_vars returns an associative array with all attributes (including private ones)
    // as the keys and their current values as the value
    $object_vars = get_object_vars($this);
    // array_key_exists will return true if the given value is a key in the array
    // or false if it is not
    return array_key_exists($attribute, $object_vars);
  }
}
