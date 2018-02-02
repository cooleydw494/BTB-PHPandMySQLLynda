<?php

class Beverage {
  public $name;

  public function __construct() {
    echo 'New beverage created<br />';
  }

  public function __clone() {
    echo 'Existing beverage was cloned.<br />';
  }
}

$a = new Beverage;
$a->name = 'coffee';
$b = $a;
$b->name = 'tea';
echo $a->name . '<br />';

$c = clone $a;
$c->name = 'orange juice';

echo $a->name . '<br />';
echo $c->name . '<br />';
