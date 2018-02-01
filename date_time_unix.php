<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Date Time Unix</title>
  </head>
  <body>

  <?php
  echo time() . '<br />';
  echo mktime(2, 30, 45, 10, 1, 2018) . '<br />';
  echo (checkdate(12, 31, 2000) ? 'true date' : 'false date') . '<br />';
  echo (checkdate(2, 31, 2000) ? 'true date' : 'false date') . '<br />';

  $unix_timestamp = strtotime('last year');
  echo $unix_timestamp . '<br />';
   ?>

  </body>
</html>
