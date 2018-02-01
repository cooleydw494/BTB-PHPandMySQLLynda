<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Variable Variables</title>
  </head>
  <body>

  <?php
  $a = 'hello';
  $hello = 'hello everyone.';
  echo $a . '<br />';
  echo $hello . '<br />';

  echo $$a . '<br />';
   ?>

  </body>
</html>
