<?php

$file = 'filetest.txt';
if ($handle = fopen($file, 'r')) {
  $content = fread($handle, 6); // each character is 1 byte
  fclose($handle);
}

echo nl2br($content) . '<br />';

echo '<hr />';


// filesize() gives you the number of bytes in a file
// you can use it to read the whole file
$file = 'filetest.txt';
if ($handle = fopen($file, 'r')) {
  $content = fread($handle, filesize($file));
  fclose($handle);
}

echo nl2br($content) . '<br />';

echo '<hr />';

// file_get_contents(): shortcut for fopen/fread/fclose
// companion to shortcut file_put_contents()
$content = file_get_contents($file);
echo nl2br($content) . '<hr />';

// incremental reading
// fgets returns one line
$file = 'filetest.txt';
$content = '';
if ($handle = fopen($file, 'r')) {
  while (!feof($handle)) {
    $content .= fgets($handle);
  }
  fclose($handle);
}

echo nl2br($content) . '<hr />';
