<?php
require_once '../../includes/initialize.php';
if (!$session->is_logged_in()) { redirect_to("login.php"); }

// $user = new User;
// //$user->id = 10;
// $user->username = "lololol";
// $user->password = "secret";
// $user->first_name = "lolo";
// $user->last_name = "lol";
// $user->save();
?>
<?php include_layout_template('admin_header.php'); ?>
		<h2>Menu</h2>

<?php include_layout_template('admin_footer.php'); ?>
