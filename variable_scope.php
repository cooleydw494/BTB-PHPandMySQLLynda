<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Variable Scope</title>
  </head>
  <body>

  <?php
  $var = 1;
  function test1() {
    $var = 2;
    echo $var . '<br />';
  }
  test1();
  echo $var . '<br />';

  echo '<hr />';

//using global inside function
  $var = 1;
  function test2() {
    global $var;
    $var = 2;
    echo $var . '<br />';
  }
  test2();
  echo $var . '<br />';

  echo '<hr />';

//using static variables inside function
  $var = 1;
  function test3() {
    static $var = 2;
    echo $var . '<br />';
    $var++;
  }
  test3();
  test3();
  test3();
  echo $var . '<br />';

   ?>

  </body>
</html>
