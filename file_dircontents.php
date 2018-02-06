<?php

// like fopen/fread/fclose
// opendir()
// readdir()
// closedir()

$dir = ".";
if (is_dir($dir)) {
  if ($dir_handle = opendir($dir)) {
    while ($filename = readdir($dir_handle)) {
      echo "filename: {$filename}<br />";
    }
  }
}
