<?php

class Person {
  function say_hello() {
    echo 'Hello from inside a class.<br />';
  }
}

$person1 = new Person;
$person1->say_hello();

$person2 = new Person;

echo get_class($person1) . '<br />';

if (is_a($person1, 'Person')) {
  echo 'Its a person<br />';
} else {
  echo 'Not a person<br />';
}
