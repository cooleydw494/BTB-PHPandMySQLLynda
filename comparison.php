<?php

class Box {
  public $name = 'box';
}

$box = new Box;
$box_reference = $box;
$box_clone = clone $box;
$box_changed = clone $box;
$box_changed->name = 'changed box';
$another_box = new Box;

echo 'box == box_reference: ' . ($box == $box_reference ? 'true' : 'false') . '<br />';
echo 'box == box_clone: ' . ($box == $box_clone ? 'true' : 'false') . '<br />';
echo 'box == box_changed(after cloning): ' . ($box == $box_changed ? 'true' : 'false') . '<br />';
echo 'box == another_box: ' . ($box == $another_box ? 'true' : 'false') . '<br />';

echo '<hr />';

echo 'box === box_reference: ' . ($box === $box_reference ? 'true' : 'false') . '<br />';
echo 'box === box_clone: ' . ($box === $box_clone ? 'true' : 'false') . '<br />';
echo 'box === box_changed(after cloning): ' . ($box === $box_changed ? 'true' : 'false') . '<br />';
echo 'box === another_box: ' . ($box === $another_box ? 'true' : 'false') . '<br />';
