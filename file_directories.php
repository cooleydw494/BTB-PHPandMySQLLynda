<?php

// we already used:
// dirname()
// is_dir()

// getcwd(): Current Working Directory
echo getcwd() . '<br />';

//mkdir()
mkdir('new', 0777); // 0777 is the PHP default

// you can use unmask() to change default permission settings
// default may be 0022

// recursive dir creation
//mkdir('new/test/test2', 0777, true);

// changing dirs
//chdir('new');
echo getcwd() . '<br />';

// removing a directory
if (file_exists('new/test/test2')) {
  echo 'exists';
  rmdir('new/test/test2');
  rmdir('new/test');
  rmdir('new');
}
