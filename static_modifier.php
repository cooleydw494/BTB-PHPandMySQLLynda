<?php

class Student {
  static $total_students = 0;

  static function welcome_students($var = "Hello") {
    echo "{$var} students.";
  }
}

echo Student::$total_students . '<br />';
Student::welcome_students();
