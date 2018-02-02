<?php

class Student {
  static $total_students = 0;

  static public function add_student() {
    self::$total_students++;
  }

  static function welcome_students($var = "Hello") {
    echo "{$var} students.";
  }
}

echo Student::$total_students . '<br />';
Student::welcome_students();
echo '<br />';
Student::$total_students++;
Student::add_student();
echo Student::$total_students . '<br />';

echo '<hr />';

//static variables are shared throughout the inheritance tree.
class One {
  static $foo;
}
class Two extends One { }
class Three extends Two { }

One::$foo = 1;
Two::$foo = 2;
Three::$foo = 3;
echo One::$foo . '<br />';
echo Two::$foo . '<br />';
echo Three::$foo . '<br />';
