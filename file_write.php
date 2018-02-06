<?php

$file = 'filetest.txt';
if ($handle = fopen($file, 'w')) { //overwrites anything already there
  fwrite($handle, 'abc');
  $content = "123" . PHP_EOL . "456";
  fwrite($handle, $content);
  fclose($handle);
} else {
  echo 'Could not open file for writing';
}

// file_put_contents: shortcut for fopen/fwrite/fclose
// overwrites existing file by default (so be CAREFUL)
$file = 'filetest.txt';
$content = "111" . PHP_EOL . "222" . PHP_EOL . "333";
if ($size = file_put_contents($file, $content)) {
  echo "A file of {$size} bytes was created.";
}
