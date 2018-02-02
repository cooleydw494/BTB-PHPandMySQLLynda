<?php

class Table {
  public $legs;
  static public $total_tables = 0;

  function __construct($leg_count = 4) {
    $this->legs = $leg_count;
    self::$total_tables++;
  }
}

$table = new Table;
echo $table->legs . '<br />';

echo '<hr />';

echo Table::$total_tables . '<br />';
$t2 = new Table(5);
echo Table::$total_tables . '<br />';
$t3 = new Table(6);
echo Table::$total_tables . '<br />';
echo $t3->legs . '<br />';
