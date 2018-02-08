<?php

//we're going to need the database
require_once LIB_PATH.DS.'database.php';

class Photograph extends DatabaseObject {

  protected static $table_name = "photographs";
  protected static $db_fields = ['id', 'filename', 'type', 'size', 'caption'];
  public $id;
  public $filename;
  public $type;
  public $size;
  public $caption;


}
