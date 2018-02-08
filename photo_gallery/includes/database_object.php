<?php
//we're going to need the database
require_once LIB_PATH.DS.'database.php';

class  DatabaseObject {

  public static function find_all() {
    $result_set = static::find_by_sql('SELECT * FROM ' . static::$table_name);
    return $result_set;
  }

  public static function find_by_id($id=0) {
    global $database;
    $result_array = static::find_by_sql("SELECT * FROM " . static::$table_name .  " WHERE id = {$id}");
    return !empty($result_array) ? array_shift($result_array) : false;
  }

  public static function find_by_sql($sql = '') {
    global $database;
    $result_set = $database->query($sql);
    $object_array = [];
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = static::instantiate($row);
    }
    return $object_array;
  }

  private static function instantiate($record) {
    $object = new static;

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
    $object_vars = $this->attributes();
    // array_key_exists will return true if the given value is a key in the array
    // or false if it is not
    return array_key_exists($attribute, $object_vars);
  }

  protected function attributes() {
    //return an array of attribute keys and their values
    $attributes = [];
    foreach(static::$db_fields as $field) {
      if (property_exists($this, $field)) {
        $attributes[$field] = $this->$field;
      }
    }
  }

  protected function sanitized_attributes() {
    global $database;
    $clean_attributes = [];
    // sanitize the values before submitting
    // Note: does not alter the actual value of each attribute
    foreach ($this->attributes() as $key => $value) {
      $clean_attributes[$key] = $database->escape_value($value);
    }
    return $clean_attributes;
  }

  public function save() {
    // A new record won't have an id yet
    return isset($this->id) ? $this->update() : $this->create();
  }

  protected function create() {
    global $database;
    // Don't forget your SQL syntax and good habits
    // - INSERT INTO table (key, key) VALUES ('value', 'value')
    // - single-quotes around all values
    // - escape all values to prevent SQL injection

    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO ". static::$table_name . " (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    var_dump($sql);
    if ($database->query($sql)) {
      $this->id = $database->insert_id();
      return true;
    } else {
      return false;
    }
  }

  protected function update() {
    global $database;
    // Don't forget your SQL syntax and good habits
    // - UPDATE table SET key='value', key='value' WHERE condition
    // - single-quotes around all values
    // - escape all values to prevent SQL injection

    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach ($attributes as $key => $value) {
      $attribute_pairs[] = "{$key} = '{$value}'";
    }
    $sql = "UPDATE ". static::$table_name . " SET ";
    $sql .= join(", ", $attribute_pairs);
    $sql .= " WHERE id=" . $database->escape_value($this->id);
    $database->query($sql);
    if ($database->affected_rows() == 1) {
      return true;
    } else {
      return false;
    }
  }

  public function delete() {
    global $database;
    // Don't forget your SQL syntax and good habits:
    // - DELETE FROM table WHERE condition LIMIT 1
    // - escape all values to prevent SQL injection
    // - use LIMIT 1
    $sql = "DELETE FROM ". static::$table_name . " WHERE";
    $sql .= " id = " . $database->escape_value($this->id);
    $sql .= " LIMIT 1";
    $database->query($sql);
    return ($database->affected_rows() == 1) ? true : false;
  }

}
