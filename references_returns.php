<!DOCTYPE html>
<html lang="en">
  <head>
    <title>References as Function Return Values</title>
  </head>
  <body>

  <?php
  function &ref_return() {
    global $a;
    $a *= 2;
    return $a;
  }
  $a = 10;
  $b =& ref_return();
  echo $a . '<br />';
  echo $b . '<br />';

  $b = 30;
  echo $a . '<br />';
  echo $b . '<br />';

  echo '<hr />';

  function &increment() {
    static $var = 0;
    $var++;
    return $var;
  }

  $a =& increment();
  increment();
  $a++;
  increment();
  echo 'a: ' . $a . '<br />';
   ?>

  </body>
</html>
