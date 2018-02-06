<?php

$file = 'filetest.txt';
if ($handle = fopen($file, 'w')) {
  fwrite($handle, "123" . PHP_EOL . "456" . PHP_EOL . "789");

  $pos = ftell($handle);
  fseek($handle, $pos - 6);
  fwrite($handle, 'abcdef');

  rewind($handle);
  fwrite($handle, 'xyz');

  fclose($handle);
}

// Beware after moving the pointer you will type over what is there
// NOTE: a and a+ modes will not let you move the pointer (r+ will)
