<!DOCTYPE html>
<html lang="en">
  <head>
    <title>References</title>
  </head>
  <body>

  <?php
  $a = 1;
  $b = $a;
  $b = 2;
  echo 'a: ' . $a . '<br />';
  echo 'b: ' . $b . '<br />';

  echo '<hr />';

  $a = 1;
  $b =& $a;
  //or $b = &$a
  $b = 2;
  echo 'a: ' . $a . '<br />';
  echo 'b: ' . $b . '<br />';

  unset($b);
  echo 'a: ' . $a . '<br />';
  echo 'b: ' . $b . '<br />';
   ?>

  </body>
</html>
