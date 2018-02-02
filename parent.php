<?php

class A {
  static $a = 1;

  static function modified_a() {
    return self::$a + 10;
  }
  public function hello() {
    echo 'Hello<br />';
  }
}

class B extends A {
  static function attr_test() {
    echo parent::$a . '<br />';
  }
  static function method_test() {
    echo parent::modified_a() . '<br />';
  }
  public function instance_test() {
    echo parent::hello();
  }
  public function hello() {
    echo '*******';
    parent::hello();
    echo '*******';
  }
}

echo B::$a . '<br />';
echo B::modified_a() . '<br />';

echo '<hr />';

B::attr_test();
B::method_test();

echo '<hr />';

$object = new B;
$object->instance_test();
$object->hello();
