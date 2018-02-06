<?php
require_once '../../includes/initialize.php';
if (!$session->is_logged_in()) { redirect_to("login.php"); }

$file = SITE_ROOT.DS.'logs'.DS.'log.txt';

if (isset($_GET['clear']) && $_GET['clear'] == "true") {
  if (file_exists($file)) {
    $handle = fopen($file, 'w');
    $currentUser = User::find_by_id($session->user_id);
    log_action('Log Cleared', "{$currentUser->username} cleared the log");
    fclose($handle);
    redirect_to('logfile.php');
  }
}
?>
<?php include_layout_template('admin_header.php'); ?>
		<h2>Log File</h2>
    <a href="logfile.php?clear=true" onclick="return confirm('Are you sure you want to clear the log file?');">
      Clear Log File
    </a>
    <hr />
<?php
if (file_exists($file)) {

  // write out each line with fgets
  // $handle = fopen($file, 'r');
  // while(!feof($handle)) {
  //   echo fgets($handle) . '<br />';
  // }
  // fclose($handle);

  // write entire contents turning newlines into breaks
  echo nl2br(file_get_contents($file));

} else {
  echo "No log file extant.";
}
 ?>

<?php include_layout_template('admin_footer.php'); ?>
