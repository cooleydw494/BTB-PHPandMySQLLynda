<?php

class Car {
  var $wheels = 4;
  var $doors = 4;

  function wheelsdoors() {
    return $this->wheels + $this->doors;
  }
}

class CompactCar extends Car {
  var $doors = 2;

  function wheelsdoors() {
    return $this->wheels + $this->doors + 100;
  }
}

$car1 = new Car;
$car2 = new CompactCar;

echo $car1->wheels . '<br />';
echo $car1->doors . '<br />';
echo $car1->wheelsdoors() . '<br />';

echo '<hr />';

echo $car2->wheels . '<br />';
echo $car2->doors . '<br />';
echo $car2->wheelsdoors() . '<br />';

echo '<hr />';

echo "Car parent: " . get_parent_class('Car') . '<br />';
echo "CompactCar parent: " . get_parent_class('CompactCar') . '<br />';
echo 'Is Car subclass of Car?: ' . (is_subclass_of('Car', 'Car') ? 'true' : 'false') . '<br />';
echo 'Is CompactCar subclass of Car?: ' . (is_subclass_of('CompactCar', 'Car') ? 'true' : 'false') . '<br />';
echo 'Is Car subclass of CompactCar?: ' . (is_subclass_of('Car', 'CompactCar') ? 'true' : 'false') . '<br />';
