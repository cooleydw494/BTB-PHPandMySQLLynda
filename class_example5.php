<?php

class Person {

  var $first_name;
  var $last_name;
  var $arm_count = 2;
  var $leg_count = 2;

  function say_hello() {
    echo 'Hello from inside the class ' . get_class($this) . '.<br />';
  }

  function full_name() {
    return $this->first_name . ' ' . $this->last_name;
  }
}

$person1 = new Person;
echo $person1->arm_count . '<br />';

$person1->arm_count = 3;
$person1->first_name = 'Lucy';
$person1->last_name = 'Ricardo';

$person2 = new Person;
$person2->first_name = 'Ethel';
$person2->last_name = 'Mertz';

echo $person1->first_name . '<br />';
echo $person2->first_name . '<br />';

echo $person1->full_name() . '<br />';
echo $person2->full_name() . '<br />';

$vars = get_class_vars('Person');
foreach($vars as $var => $value) {
  echo "{$var}: {$value}<br />";
}

echo (property_exists('Person', 'first_name') ? 'true' : 'false') . '<br />';
echo (property_exists($person1, 'first_name') ? 'true' : 'false') . '<br />';
