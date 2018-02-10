<?php
require_once '../includes/initialize.php';

$photos = Photograph::find_all();

include_layout_template('header.php');
?>

<h1>User Photos</h1>
<hr />

<?php foreach ($photos as $photo) { ?>
  <br />
  <h3><?php echo $photo->caption; ?></h3>
  <a href="photo.php?id=<?php echo $photo->id; ?>">
    <img src="<?php echo $photo->image_path(); ?>" alt="<?php echo $photo->filename; ?>" width="150">
  </a>
  <br />
  <hr />

<?php } ?>

<?php include_layout_template('footer.php'); ?>
