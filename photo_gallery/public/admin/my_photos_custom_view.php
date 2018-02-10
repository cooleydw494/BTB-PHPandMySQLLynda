<?php
require_once '../../includes/initialize.php';

if (!$session->is_logged_in()) { redirect_to('login.php'); }

$my_photos = Photograph::find_all();

include_layout_template('admin_header.php');
?>

<h1>My Photos</h1>
<hr />

<?php foreach ($my_photos as $photo) { ?>
  <br />
  <h3><?php echo $photo->caption; ?></h3>
  <img src="<?php echo '../'.$photo->image_path(); ?>" alt="<?php echo $photo->filename; ?>" width="150">
  <br />
  <hr />

<?php } ?>

<?php include_layout_template('admin_footer.php'); ?>
