<?php

class Student {

}

// $classes = get_declared_classes();
// foreach ($classes as $class) {
//   echo $class . '<br />';
// }

if (class_exists('Student')) {
  echo 'That class has been defined';
} else {
  echo 'That class has not been defined';
}
