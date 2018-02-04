<?php
require_once '../includes/database.php';
require_once '../includes/user.php';

if (isset($database)) {
  echo 'database set<br />';
} else {
  echo 'nope no database set<br/>';
}

echo $database->escape_value("It's working?");

// $sql = "INSERT INTO users (id, username, password, first_name, last_name) ";
// $sql .= "VALUES (1, 'cooleydw494', 'secret', 'David', 'Cooley')";
// $result = $database->query($sql);
// echo "<br />";
// var_dump($result);

// $sql = "INSERT INTO users (username, password, first_name, last_name) ";
// $sql .= "VALUES ('kskoglund', 'secret', 'Kevin', 'Skoglund')";
// $result = $database->query($sql);

$sql = "SELECT * FROM users ";
$result = $database->query($sql);

while ($found_user = $database->fetch_array($result)) {
  echo '<pre>';
  var_dump($found_user);
  echo '</pre>';
}

echo '<hr />';

$found_user = User::find_by_id(1);
echo $found_user['username'];

echo '<hr />';

$all_users = User::find_all();
while($user = $database->fetch_array($all_users)) {
  echo 'User: ' . $user['username'] . '<br />';
  echo 'Name: ' . $user['first_name'] . ' ' . $user['last_name'] . '<br />';
}
